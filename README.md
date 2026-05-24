# Lucky App Test Task

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

# Create environment file
cp .env.example .env

# Build and start docker containers
docker compose up -d --build

# Install composer dependencies
docker compose run --rm app composer install

# Generate application key
docker compose run --rm app php artisan key:generate

# Run migrations
docker compose exec app php artisan migrate
