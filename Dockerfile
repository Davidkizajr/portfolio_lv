# syntax=docker/dockerfile:1

# ---------- Stage 1: build frontend assets ----------
FROM node:20-alpine AS assets
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# ---------- Stage 2: PHP application ----------
FROM php:8.5-fpm-alpine AS app

RUN apk add --no-cache \
        bash \
        git \
        curl \
        libpng-dev \
        libzip-dev \
        libxml2-dev \
        oniguruma-dev \
        icu-dev \
        nginx \
        supervisor \
        sqlite-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) \
        pdo_sqlite \
        gd \
        zip \
        mbstring \
        xml \
        intl \
        bcmath

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Install PHP deps first (better layer caching)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --no-scripts --prefer-dist --no-autoloader

# Copy app source
COPY . .

COPY --from=assets /app/public/build ./public/build

RUN composer dump-autoload --optimize \
    && mkdir -p storage/framework/{cache,sessions,views} storage/logs bootstrap/cache \
    && mkdir -p storage/app/public \
    && mkdir -p database \
    && touch database/database.sqlite \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Nginx + PHP-FPM + supervisor config
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

EXPOSE 8080

CMD ["/usr/local/bin/start.sh"]
