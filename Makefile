# TechStore Docker Commands

.PHONY: help build up down restart logs shell clean migrate seed test

# Default target
help:
	@echo "TechStore Docker Commands:"
	@echo "  build     - Build Docker images"
	@echo "  up        - Start containers"
	@echo "  down      - Stop containers"
	@echo "  restart   - Restart containers"
	@echo "  logs      - Show logs"
	@echo "  shell     - Access container shell"
	@echo "  clean     - Clean up Docker resources"
	@echo "  migrate   - Run database migrations"
	@echo "  seed      - Run database seeders"
	@echo "  test      - Run tests"

# Build Docker images
build:
	docker-compose build

# Start containers
up:
	docker-compose up -d

# Stop containers
down:
	docker-compose down

# Restart containers
restart: down up

# Show logs
logs:
	docker-compose logs -f app

# Access container shell
shell:
	docker-compose exec app bash

# Clean up Docker resources
clean:
	docker-compose down -v
	docker system prune -f

# Run database migrations
migrate:
	docker-compose exec app php artisan migrate

# Run database seeders
seed:
	docker-compose exec app php artisan db:seed

# Run tests
test:
	docker-compose exec app php artisan test

# Fresh install (migrations + seeders)
fresh:
	docker-compose exec app php artisan migrate:fresh --seed

# Generate app key
key:
	docker-compose exec app php artisan key:generate

# Clear caches
cache-clear:
	docker-compose exec app php artisan config:clear
	docker-compose exec app php artisan cache:clear
	docker-compose exec app php artisan view:clear

# Install dependencies
install:
	docker-compose exec app composer install
	docker-compose exec app npm install

# Build assets
build-assets:
	docker-compose exec app npm run build
