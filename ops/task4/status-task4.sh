#!/usr/bin/env bash
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
# shellcheck source=./task4-services.sh
source "${SCRIPT_DIR}/task4-services.sh"

TASK4_HOST="${TASK4_HOST:-}"

require_command() {
  local cmd="$1"
  if ! command -v "$cmd" >/dev/null 2>&1; then
    echo "Missing required command: ${cmd}" >&2
    exit 1
  fi
}

print_header() {
  printf "%-16s %-28s %-6s %-10s %-35s\n" "SERVICE" "PROJECT" "PORT" "STATE" "URL"
  printf "%-16s %-28s %-6s %-10s %-35s\n" "-------" "-------" "----" "-----" "---"
}

service_state() {
  local project_name="$1"
  if docker ps --filter "label=com.docker.compose.project=${project_name}" --format '{{.Names}}' | grep -q .; then
    echo "running"
  else
    echo "stopped"
  fi
}

service_url() {
  local service="$1"
  if [[ -n "${TASK4_HOST}" ]]; then
    printf "https://%s/task4/%s/\n" "${TASK4_HOST}" "${service}"
  else
    printf "/task4/%s/\n" "${service}"
  fi
}

http_check() {
  local url="$1"
  if command -v curl >/dev/null 2>&1; then
    local code
    code="$(curl -k -L -s -o /dev/null -w '%{http_code}' "${url}")"
    printf "%s" "${code}"
  else
    printf "n/a"
  fi
}

main() {
  require_command docker

  print_header
  for service in "${SERVICES[@]}"; do
    local project_name="${SERVICE_PROJECT[$service]}"
    local port="${SERVICE_PORT[$service]}"
    local state
    local url

    state="$(service_state "${project_name}")"
    url="$(service_url "${service}")"

    printf "%-16s %-28s %-6s %-10s %-35s\n" "${service}" "${project_name}" "${port}" "${state}" "${url}"
  done

  if [[ -n "${TASK4_HOST}" ]]; then
    echo
    echo "HTTP status checks (TASK4_HOST=${TASK4_HOST})"
    for service in "${SERVICES[@]}"; do
      local url="https://${TASK4_HOST}/task4/${service}/"
      local code
      code="$(http_check "${url}")"
      printf "  %-16s %s -> %s\n" "${service}" "${url}" "${code}"
    done
  else
    echo
    echo "Tip: set TASK4_HOST to run URL checks."
    echo "  TASK4_HOST=task4.example.com ./status-task4.sh"
  fi
}

main "$@"
