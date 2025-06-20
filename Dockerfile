FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install intl

# Set working directory (root of the CodeIgniter project)
WORKDIR /var/www

# Copy entire project (so app/, public/, system/, etc., are all included)
COPY . .

# Set Apache to serve from /var/www/public
ENV APACHE_DOCUMENT_ROOT=/var/www/public

# Update Apache config to use public/ as document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Fix writable permissions
RUN chown -R www-data:www-data writable \
    && chmod -R 775 writable

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 80
