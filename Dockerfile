# Use official PHP image with Apache
FROM php:8.1-apache


# Install required PHP extensions and system utilities
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl && \
    docker-php-ext-install pdo pdo_mysql zip


# Enable Apache rewrite module
RUN a2enmod rewrite


# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# Set working directory
WORKDIR /var/www/html


# Copy application code
COPY . .


# Install dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader


# Set permissions (optional but helpful)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html


# Expose port (Apache default)
EXPOSE 80
