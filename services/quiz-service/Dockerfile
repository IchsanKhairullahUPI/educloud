# Use PHP 8.3 + Composer + Nginx
FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip curl git \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlsrv sqlsrv

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy source code
COPY src/ .

# Install dependencies
RUN composer install --no-interaction --prefer-dist

# Expose port
EXPOSE 8000

# Run Laravel's built-in server
CMD php artisan serve --host=0.0.0.0 --port=8000