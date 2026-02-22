# GitHub Pages 유지 + 연도별 ServerSide(새 탭) 배포 계획

## 요약

- `webskills` 메인 사이트는 GitHub Pages를 그대로 유지합니다.
- OCI 프리티어 VM 1대에 대상 서버들을 모두 Docker로 띄우고, Nginx 경로 기반 URL로 외부 공개합니다.
- 포트폴리오에서는 iframe 대신 `새 탭 열기`를 기본으로 사용합니다.
- 요청하신 작명 규칙을 반영해 Compose 프로젝트명을 `webskills-YYYY-local|national`로 고정합니다.

## 공개 URL / 인터페이스

- 서버 공개 URL(OCI):
  - `https://<TASK4_HOST>/task4/2014-national/`
  - `https://<TASK4_HOST>/task4/2015-local/`
  - `https://<TASK4_HOST>/task4/2015-national/` (실제 소스는 `2015_전국` 브랜치의 `gwangju` 폴더)
  - `https://<TASK4_HOST>/task4/2016-local/`
  - `https://<TASK4_HOST>/task4/2016-national/`
  - `https://<TASK4_HOST>/task4/2017-local/`
  - `https://<TASK4_HOST>/task4/2017-national/`
- 프론트 변경:
  - `src/components/ProjectDetail.jsx`에 `Task4 새 탭 열기` 링크 섹션 추가.
  - 현재 페이지가 있는 `2016/2017` 상세 페이지에 우선 연결.
  - `2014/2015`는 인프라 URL 먼저 운영하고, UI 노출은 추후 페이지 추가 시 연결.

## 구현 계획

1. OCI VM(Ubuntu) 생성 후 보안 규칙을 `22/80/443`만 허용합니다.
2. VM에 Docker, Docker Compose, Nginx, Certbot을 설치합니다.
3. 저장소를 clone하고 브랜치별 worktree를 생성합니다.
4. 각 대상의 실제 Compose 경로를 아래처럼 고정합니다.
   - `2014_전국` -> `<worktree>/docker-compose.yml`
   - `2015_지방` -> `<worktree>/docker-compose.yml`
   - `2015_전국` -> `<worktree>/gwangju/docker-compose.yml`
   - `2016_지방` -> `<worktree>/docker-compose.yml`
   - `2016_전국` -> `<worktree>/4_ServerSide/docker-compose.yml`
   - `2017_지방` -> `<worktree>/4_ServerSide/docker-compose.yml`
   - `2017_전국` -> `<worktree>/4_ServerSide/docker-compose.yml`
5. `.env`의 `WEB_PORT`를 서비스별로 분리하고, Compose 실행은 아래 프로젝트명으로 고정합니다.

```bash
docker compose -p webskills-2014-national -f /srv/webskills/branches/2014-national/docker-compose.yml --env-file /srv/webskills/branches/2014-national/.env up -d
docker compose -p webskills-2015-local -f /srv/webskills/branches/2015-local/docker-compose.yml --env-file /srv/webskills/branches/2015-local/.env up -d
docker compose -p webskills-2015-national -f /srv/webskills/branches/2015-national/gwangju/docker-compose.yml --env-file /srv/webskills/branches/2015-national/gwangju/.env up -d
docker compose -p webskills-2016-local -f /srv/webskills/branches/2016-local/docker-compose.yml --env-file /srv/webskills/branches/2016-local/.env up -d
docker compose -p webskills-2016-national -f /srv/webskills/branches/2016-national/4_ServerSide/docker-compose.yml --env-file /srv/webskills/branches/2016-national/4_ServerSide/.env up -d
docker compose -p webskills-2017-local -f /srv/webskills/branches/2017-local/4_ServerSide/docker-compose.yml --env-file /srv/webskills/branches/2017-local/4_ServerSide/.env up -d
docker compose -p webskills-2017-national -f /srv/webskills/branches/2017-national/4_ServerSide/docker-compose.yml --env-file /srv/webskills/branches/2017-national/4_ServerSide/.env up -d
```

6. Nginx reverse proxy로 `/task4/...` 경로를 각 내부 포트로 매핑합니다.
7. HTTPS 인증서는 OCI 호스트 우선, 실패 시 `sslip.io` 또는 `nip.io` fallback으로 발급합니다.
8. 프론트(gh-pages)는 유지하고, Task4 링크는 외부 URL을 새 탭으로 엽니다.
9. 운영 스크립트(`deploy-task4.sh`, `status-task4.sh`)로 재배포/상태 점검을 표준화합니다.

## 테스트 케이스

1. 7개 URL 모두 `200 OK` 응답 확인.
2. 각 URL에서 로그인/세션/DB 쓰기 동작 확인.
3. GitHub Pages의 Task4 버튼 클릭 시 새 탭에서 정확한 URL 열림 확인.
4. 모바일 브라우저에서 새 탭 열기 및 로그인 플로우 확인.
5. VM 재부팅 후 컨테이너 자동 복구와 데이터 유지 확인.

## 가정 및 기본값

- 대상은 아래 전부입니다.
  - `2014_전국`
  - `2015_지방`
  - `2015_전국`은 `gwangju` 폴더 사용
  - `2016_지방`
  - `2016_전국`
  - `2017_지방`
  - `2017_전국`
- `2016_지방`은 `4_ServerSide`가 아니라 브랜치 루트 Compose를 사용합니다.
- 메인 사이트는 GitHub Pages 유지가 기본이며, Task4는 새 탭 연결이 기본입니다.

---

## OCI 실행 명령 세트 (복붙용 Runbook)

아래는 Ubuntu VM에서 순서대로 실행하는 명령입니다.

### 0) 변수 설정

```bash
export REPO_URL="https://github.com/JuheonOh/webskills.git"
export BASE_DIR="/srv/webskills"
export LE_EMAIL="dhwngjs01@naver.com"   # certbot 이메일

# 1순위: 실제 도메인 사용
# export TASK4_HOST="task4.your-domain.com"

# 2순위 fallback: VM 공인IP 기반 nip.io
export PUBLIC_IP="$(curl -s ifconfig.me)"
export TASK4_HOST="${PUBLIC_IP}.nip.io"

echo "TASK4_HOST=${TASK4_HOST}"
```

### 1) 서버 기본 패키지 설치

```bash
sudo apt-get update
sudo apt-get install -y software-properties-common
sudo add-apt-repository -y universe
sudo apt-get update
sudo apt-get install -y git docker.io docker-compose-v2 nginx certbot
sudo usermod -aG docker "$USER"
newgrp docker
docker --version
docker compose version
```

### 2) 코드 배치

```bash
sudo mkdir -p "${BASE_DIR}"
sudo chown -R "$USER:$USER" "${BASE_DIR}"

if [ ! -d "${BASE_DIR}/repo/.git" ]; then
  git clone "${REPO_URL}" "${BASE_DIR}/repo"
else
  git -C "${BASE_DIR}/repo" pull --ff-only
fi
```

### 3) Task4 컨테이너 7종 배포

```bash
cd "${BASE_DIR}/repo/ops/task4"
chmod +x deploy-task4.sh status-task4.sh
./deploy-task4.sh all
./status-task4.sh
```

### 4) TLS 인증서 선발급 (standalone)

`task4-proxy.conf.example`는 SSL 경로를 포함하므로 인증서를 먼저 발급합니다.

```bash
sudo systemctl stop nginx || true
sudo certbot certonly --standalone \
  -d "${TASK4_HOST}" \
  --non-interactive \
  --agree-tos \
  -m "${LE_EMAIL}"
```

### 5) Nginx reverse proxy 적용

```bash
cd "${BASE_DIR}/repo/ops/task4"

sudo cp nginx/task4-proxy-common.conf.example /etc/nginx/snippets/task4-proxy-common.conf
sudo cp nginx/task4-proxy.conf.example /etc/nginx/sites-available/task4-proxy.conf
sudo sed -i "s|<TASK4_HOST>|${TASK4_HOST}|g" /etc/nginx/sites-available/task4-proxy.conf

if [ ! -e /etc/nginx/sites-enabled/task4-proxy.conf ]; then
  sudo ln -s /etc/nginx/sites-available/task4-proxy.conf /etc/nginx/sites-enabled/task4-proxy.conf
fi

sudo nginx -t
sudo systemctl enable nginx
sudo systemctl restart nginx
```

### 6) 동작 확인

```bash
cd "${BASE_DIR}/repo/ops/task4"
TASK4_HOST="${TASK4_HOST}" ./status-task4.sh

curl -I "https://${TASK4_HOST}/task4/2014-national/"
curl -I "https://${TASK4_HOST}/task4/2015-local/"
curl -I "https://${TASK4_HOST}/task4/2015-national/"
curl -I "https://${TASK4_HOST}/task4/2016-local/"
curl -I "https://${TASK4_HOST}/task4/2016-national/"
curl -I "https://${TASK4_HOST}/task4/2017-local/"
curl -I "https://${TASK4_HOST}/task4/2017-national/"
```

### 7) GitHub Pages 링크값 반영

현재 코드에는 `https://<TASK4_HOST>/...` 플레이스홀더가 들어가 있습니다.
아래 파일의 URL을 실제 호스트로 치환 후 GitHub Pages 배포를 진행합니다.

- `src/pages/National2016.jsx`
- `src/pages/Local2017.jsx`
- `src/pages/National2017.jsx`

예시:

```text
https://<TASK4_HOST>/task4/2016-national/
-> https://task4.your-domain.com/task4/2016-national/
```

### 8) 운영 명령

```bash
# 전체 재배포
cd "${BASE_DIR}/repo/ops/task4"
./deploy-task4.sh all

# 특정 서비스만 재배포
./deploy-task4.sh 2016-national
./deploy-task4.sh 2017-local

# 상태 점검
TASK4_HOST="${TASK4_HOST}" ./status-task4.sh
```

### 9) OCI 네트워크 체크리스트

OCI 콘솔에서 다음 인바운드 포트 허용 여부를 확인합니다.

- `22/tcp` (SSH)
- `80/tcp` (HTTP)
- `443/tcp` (HTTPS)
