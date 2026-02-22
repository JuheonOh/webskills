#!/usr/bin/env bash

BASE_DIR="${BASE_DIR:-/srv/webskills}"
REPO_URL="${REPO_URL:-https://github.com/JuheonOh/webskills.git}"
REPO_DIR="${REPO_DIR:-${BASE_DIR}/repo}"
BRANCHES_DIR="${BRANCHES_DIR:-${BASE_DIR}/branches}"
ENV_DIR="${ENV_DIR:-${BASE_DIR}/runtime-env}"

SERVICES=(
  "2014-national"
  "2015-local"
  "2015-national"
  "2016-local"
  "2016-national"
  "2017-local"
  "2017-national"
)

declare -A SERVICE_BRANCH=(
  ["2014-national"]="2014_전국"
  ["2015-local"]="2015_지방"
  ["2015-national"]="2015_전국"
  ["2016-local"]="2016_지방"
  ["2016-national"]="2016_전국"
  ["2017-local"]="2017_지방"
  ["2017-national"]="2017_전국"
)

declare -A SERVICE_WORKTREE=(
  ["2014-national"]="2014-national"
  ["2015-local"]="2015-local"
  ["2015-national"]="2015-national"
  ["2016-local"]="2016-local"
  ["2016-national"]="2016-national"
  ["2017-local"]="2017-local"
  ["2017-national"]="2017-national"
)

declare -A SERVICE_COMPOSE=(
  ["2014-national"]="docker-compose.yml"
  ["2015-local"]="docker-compose.yml"
  ["2015-national"]="gwangju/docker-compose.yml"
  ["2016-local"]="docker-compose.yml"
  ["2016-national"]="4_ServerSide/docker-compose.yml"
  ["2017-local"]="4_ServerSide/docker-compose.yml"
  ["2017-national"]="4_ServerSide/docker-compose.yml"
)

declare -A SERVICE_ENV_PATH=(
  ["2014-national"]=".env"
  ["2015-local"]=".env"
  ["2015-national"]="gwangju/.env"
  ["2016-local"]=".env"
  ["2016-national"]="4_ServerSide/.env"
  ["2017-local"]="4_ServerSide/.env"
  ["2017-national"]="4_ServerSide/.env"
)

declare -A SERVICE_PROJECT=(
  ["2014-national"]="webskills-2014-national"
  ["2015-local"]="webskills-2015-local"
  ["2015-national"]="webskills-2015-national"
  ["2016-local"]="webskills-2016-local"
  ["2016-national"]="webskills-2016-national"
  ["2017-local"]="webskills-2017-local"
  ["2017-national"]="webskills-2017-national"
)

declare -A SERVICE_PORT=(
  ["2014-national"]="18014"
  ["2015-local"]="18015"
  ["2015-national"]="18016"
  ["2016-local"]="18017"
  ["2016-national"]="18018"
  ["2017-local"]="18019"
  ["2017-national"]="18020"
)

is_valid_service() {
  local service="$1"
  for item in "${SERVICES[@]}"; do
    if [[ "$item" == "$service" ]]; then
      return 0
    fi
  done
  return 1
}

list_services() {
  printf "%s\n" "${SERVICES[@]}"
}
