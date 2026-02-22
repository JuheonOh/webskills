#!/usr/bin/env bash
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
# shellcheck source=./task4-services.sh
source "${SCRIPT_DIR}/task4-services.sh"

usage() {
  cat <<'EOF'
Usage:
  ./deploy-task4.sh all
  ./deploy-task4.sh 2016-national
  ./deploy-task4.sh 2016-national 2017-local

Supported services:
  2014-national
  2015-local
  2015-national
  2016-local
  2016-national
  2017-local
  2017-national
EOF
}

require_command() {
  local cmd="$1"
  if ! command -v "$cmd" >/dev/null 2>&1; then
    echo "Missing required command: ${cmd}" >&2
    exit 1
  fi
}

prepare_repo() {
  mkdir -p "${BASE_DIR}" "${BRANCHES_DIR}" "${ENV_DIR}"

  if [[ ! -d "${REPO_DIR}/.git" ]]; then
    echo "[repo] cloning ${REPO_URL} -> ${REPO_DIR}"
    git clone "${REPO_URL}" "${REPO_DIR}"
  fi
}

prepare_worktree() {
  local service="$1"
  local branch="${SERVICE_BRANCH[$service]}"
  local worktree="${BRANCHES_DIR}/${SERVICE_WORKTREE[$service]}"

  if [[ ! -d "${worktree}/.git" ]]; then
    echo "[worktree] creating ${worktree} (${branch})"
    git -C "${REPO_DIR}" fetch origin "${branch}"
    git -C "${REPO_DIR}" worktree add -B "${branch}" "${worktree}" "origin/${branch}"
  else
    echo "[worktree] updating ${worktree} (${branch})"
    git -C "${worktree}" fetch origin "${branch}"
    git -C "${worktree}" checkout "${branch}"
    git -C "${worktree}" pull --ff-only origin "${branch}"
  fi
}

render_runtime_env() {
  local service="$1"
  local worktree="${BRANCHES_DIR}/${SERVICE_WORKTREE[$service]}"
  local source_env="${worktree}/${SERVICE_ENV_PATH[$service]}"
  local runtime_env="${ENV_DIR}/${service}.env"
  local port="${SERVICE_PORT[$service]}"

  if [[ ! -f "${source_env}" ]]; then
    echo "[env] missing source env file: ${source_env}" >&2
    exit 1
  fi

  cp "${source_env}" "${runtime_env}"

  if grep -q '^WEB_PORT=' "${runtime_env}"; then
    sed -i "s/^WEB_PORT=.*/WEB_PORT=${port}/" "${runtime_env}"
  else
    printf '\nWEB_PORT=%s\n' "${port}" >>"${runtime_env}"
  fi

  echo "[env] ${runtime_env} (WEB_PORT=${port})"
}

deploy_service() {
  local service="$1"
  local worktree="${BRANCHES_DIR}/${SERVICE_WORKTREE[$service]}"
  local compose_file="${worktree}/${SERVICE_COMPOSE[$service]}"
  local runtime_env="${ENV_DIR}/${service}.env"
  local project_name="${SERVICE_PROJECT[$service]}"

  if [[ ! -f "${compose_file}" ]]; then
    echo "[compose] missing compose file: ${compose_file}" >&2
    exit 1
  fi

  echo "[deploy] ${service} -> ${project_name}"
  docker compose \
    -p "${project_name}" \
    -f "${compose_file}" \
    --env-file "${runtime_env}" \
    up -d
}

main() {
  require_command git
  require_command docker

  if [[ $# -eq 0 ]]; then
    usage
    exit 1
  fi

  local targets=()
  if [[ "$1" == "all" ]]; then
    targets=("${SERVICES[@]}")
  else
    targets=("$@")
  fi

  for service in "${targets[@]}"; do
    if ! is_valid_service "${service}"; then
      echo "Unsupported service: ${service}" >&2
      usage
      exit 1
    fi
  done

  prepare_repo

  for service in "${targets[@]}"; do
    prepare_worktree "${service}"
    render_runtime_env "${service}"
    deploy_service "${service}"
  done

  echo
  echo "Deployment complete."
  echo "Run ./status-task4.sh to verify status and URLs."
}

main "$@"
