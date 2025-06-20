FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install intl

# Set working directory to public
WORKDIR /var/www/html

# Copy app into container
COPY . /var/www/html/

# Move to public folder as web root
COPY ./public /var/www/html

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/writable \
    && chmod -R 775 /var/www/html/writable

# Change Apache DocumentRoot to /var/www/html (where public/ files now live)
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Update Apache config to use new document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 80
