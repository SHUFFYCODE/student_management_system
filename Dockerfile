FROM php:8.1-apache


# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip zip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip


# Enable Apache mod_rewrite
RUN a2enmod rewrite


# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


# Set working directory
WORKDIR /var/www/html


# Copy project files
COPY . .


# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER=1


# Install PHP dependencies (with verbose logging if it fails)
RUN composer install --no-scripts --no-plugins --no-interaction --verbose || cat /tmp/composer.log || true


# Set file permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html


EXPOSE 80
