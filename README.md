# Nuxgame Test Task

Test task built with:

- PHP 8.3
- Laravel 13
- MySQL 8
- Docker

---

# Features

- User registration
- Unique access link generation
- Link expiration after 7 days
- Link regeneration
- Link deactivation
- Lucky game logic
- Last 3 game results history

---

# Requirements

- Docker
- Docker Compose

---

# Installation

Clone repository:

```bash
git clone <repository-url>
cd <project-folder>
```

Create environment file:

```bash
cp .env
```

Build and start docker containers:

```bash
docker compose up -d --build
```

Install composer dependencies:

```bash
docker compose run --rm app composer install
```

Generate application key:

```bash
docker compose run --rm app php artisan key:generate
```

Run migrations:

```bash
docker compose exec app php artisan migrate
```

Open application: 

```
http://localhost:8000
```

Database connection:

```
Host: 127.0.0.1
Port: 3307
Database: nuxgame-test
Username: root
Password: root
```

Stop containers:

```bash
docker compose down
```
