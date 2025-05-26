FROM php:8.3-fpm

# Installer extensions nécessaires
RUN apt-get update && apt-get install -y \
    libpq-dev git zip unzip curl \
    && docker-php-ext-install pdo pdo_pgsql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
