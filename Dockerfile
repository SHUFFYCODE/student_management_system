# Use official PHP 8.1 Apache image
FROM php:8.1-apache


# Enable Apache mod_rewrite
RUN a2enmod rewrite


# Set working directory inside container
WORKDIR /var/www/html


# Install system dependencies and Composer
RUN apt-get update && \
    apt-get install -y unzip git curl && \
    curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer


# Copy application source code
COPY . /var/www/html


# Fix folder permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html


# Set Apache to serve from /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf


# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader


# Expose port 80
EXPOSE 80


# Start Apache in foreground
CMD ["apache2-foreground"]
