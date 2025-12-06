#!/bin/bash

cd /var/www/hrms

# Stop existing containers
docker compose down

# Build and start containers
# This builds the images on the server using the new code
docker compose up --build -d

# Run migrations inside the app container
docker compose exec -T app php artisan migrate --force

# Clear caches inside the container
docker compose exec -T app php artisan optimize:clear
docker compose exec -T app php artisan config:cache
docker compose exec -T app php artisan route:cache
docker compose exec -T app php artisan view:cache

# Link storage (if not already done)
docker compose exec -T app php artisan storage:link
