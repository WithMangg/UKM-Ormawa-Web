FROM php:8.2-fpm-alpine

LABEL maintainer="Mangg Dev Team"

# workdir
WORKDIR /var/www/html

# Update the package repository and install supervisor
RUN apk update && apk add --no-cache supervisor

# Copy the Supervisor configuration file
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy the PHP configuration file
COPY php.ini /usr/local/etc/php/php.ini

# Install PHP extensions for MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer (latest stable)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Verify Composer installation
RUN composer --version

# Run Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
