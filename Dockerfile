# Stage 1: Build vendor dependencies
FROM composer:2.7 AS builder
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist --optimize-autoloader

# Stage 2: Production image
FROM php:8.3-cli-alpine3.19

# Install runtime dependencies for PHP extensions
RUN apk add --no-cache \
    sqlite-dev \
    oniguruma-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_sqlite mbstring xml bcmath

WORKDIR /var/www

# Salin dependensi dari builder
COPY --from=builder /app/vendor ./vendor

# Salin source code
COPY . .

# Setup env dan cache
RUN rm -f bootstrap/cache/*.php && \
    cp .env.example .env && \
    php artisan key:generate

# Tambahkan USER non-root
RUN adduser -D -u 1000 laravel && \
    chown -R laravel:laravel /var/www
USER laravel

# Tambahkan HEALTHCHECK
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
  CMD wget -qO- http://127.0.0.1:8000/api/tugas || exit 1

EXPOSE 8000
CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=8000"]
