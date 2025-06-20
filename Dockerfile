# Use the official PHP image with Apache
FROM php:8.1-apache


# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    git \
    curl && \
    docker-php-ext-install pdo_mysql zip


# Enable Apache mod_rewrite
RUN a2enmod rewrite


# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# Set working directory
WORKDIR /var/www/html


# Copy project files
COPY . /var/www/html


# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html


# Set environment variables
ENV APACHE_DOCUMENT_ROOT /var/www/html/public


# Update Apache config to use public/ as root
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf


# Expose port 80
EXPOSE 80


