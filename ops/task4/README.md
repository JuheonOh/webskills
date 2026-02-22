# Task4 Multi-Branch Deployment (OCI)

This directory contains deployment scripts and Nginx templates for running all
ServerSide projects on one OCI VM while keeping the main portfolio on GitHub
Pages.

## Targets

- `2014_전국` -> `docker-compose.yml`
- `2015_지방` -> `docker-compose.yml`
- `2015_전국` -> `gwangju/docker-compose.yml`
- `2016_지방` -> `docker-compose.yml`
- `2016_전국` -> `4_ServerSide/docker-compose.yml`
- `2017_지방` -> `4_ServerSide/docker-compose.yml`
- `2017_전국` -> `4_ServerSide/docker-compose.yml`

Compose project names are fixed:

- `webskills-2014-national`
- `webskills-2015-local`
- `webskills-2015-national`
- `webskills-2016-local`
- `webskills-2016-national`
- `webskills-2017-local`
- `webskills-2017-national`

## 1) VM prerequisites

```bash
sudo apt-get update
sudo apt-get install -y git docker.io docker-compose-plugin nginx certbot python3-certbot-nginx
sudo usermod -aG docker $USER
```

Re-login once after adding docker group.

## 2) Deploy containers

```bash
cd /srv/webskills/repo/ops/task4
chmod +x deploy-task4.sh status-task4.sh
./deploy-task4.sh all
```

To deploy only one service:

```bash
./deploy-task4.sh 2016-national
```

Runtime `.env` files are generated in `/srv/webskills/runtime-env` and
`WEB_PORT` is automatically rewritten per service.

## 3) Configure Nginx

1. Copy template:

```bash
sudo cp nginx/task4-proxy-common.conf.example /etc/nginx/snippets/task4-proxy-common.conf
sudo cp nginx/task4-proxy.conf.example /etc/nginx/sites-available/task4-proxy.conf
```

2. Replace `<TASK4_HOST>` in `/etc/nginx/sites-available/task4-proxy.conf`.
3. Enable site:

```bash
sudo ln -s /etc/nginx/sites-available/task4-proxy.conf /etc/nginx/sites-enabled/task4-proxy.conf
sudo nginx -t
sudo systemctl reload nginx
```

## 4) HTTPS

Preferred:

```bash
sudo certbot --nginx -d <TASK4_HOST>
```

Fallback host (if OCI host is unavailable): `sslip.io` or `nip.io`.

## 5) Check status

```bash
./status-task4.sh
TASK4_HOST=<TASK4_HOST> ./status-task4.sh
```

## External routes

- `https://<TASK4_HOST>/task4/2014-national/`
- `https://<TASK4_HOST>/task4/2015-local/`
- `https://<TASK4_HOST>/task4/2015-national/`
- `https://<TASK4_HOST>/task4/2016-local/`
- `https://<TASK4_HOST>/task4/2016-national/`
- `https://<TASK4_HOST>/task4/2017-local/`
- `https://<TASK4_HOST>/task4/2017-national/`
