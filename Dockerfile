FROM php:8.3-cli-bookworm

WORKDIR /var/www

# 1. Install sistem dependensi dan ekstensi PHP yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_sqlite mbstring xml bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Ambil Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 3. Kopi file composer terlebih dahulu untuk memanfaatkan Docker layer caching
# Alasan: Dependensi jarang berubah dibanding kode sumber aplikasi.
COPY composer.json composer.lock ./

# 4. Install dependensi composer
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist --optimize-autoloader

# 5. Kopi seluruh source code aplikasi
COPY . .

# 6. Bersihkan cache dan setup env
RUN rm -f bootstrap/cache/*.php && \
    cp .env.example .env && \
    php artisan key:generate

# 7. Expose port dan command
EXPOSE 8000
CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=8000"]
