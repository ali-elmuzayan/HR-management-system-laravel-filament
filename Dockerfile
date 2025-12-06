# -----------------------------
# STAGE 1 — Composer Dependencies
# -----------------------------
FROM composer:2 AS composer_builder
WORKDIR /app

# Copy only composer files for better caching & install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction


#-------------------   STAGE 2 — Node/Vite Build   ------------------
FROM node:20 AS node_builder
WORKDIR /app

# Copy package files & install dependencies
COPY package.json package-lock.json ./
RUN npm install

# Copy all source code & build vite assets
COPY . .
RUN npm run build



# --------------------  STAGE 3 — Production Image (PHP-FPM)   --------------
FROM php:8.2-fpm AS app
WORKDIR /var/www/html

# Install system dependencies for Laravel
RUN apt-get update && apt-get install -y \
    zip unzip git libpng-dev libonig-dev libxml2-dev libzip-dev curl \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath \
    && docker-php-ext-enable pcntl

# Copy application code
COPY . .

# Copy Composer vendor & build assets from stage 1 & 2
COPY --from=composer_builder /app/vendor ./vendor
COPY --from=node_builder /app/public/build ./public/build

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Laravel Optimizations
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

EXPOSE 9000
CMD ["php-fpm"]


# --------------------   STAGE 4 — Nginx for Serving the App  --------------------
FROM nginx:1.27-alpine AS web

# Copy Nginx configuration
COPY ./nginx.conf /etc/nginx/conf.d/default.conf

# Copy Laravel app from PHP image (so Nginx can serve static files)
COPY --from=app /var/www/html /var/www/html

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]