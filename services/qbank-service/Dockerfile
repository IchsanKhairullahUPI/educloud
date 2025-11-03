# auth-service/Dockerfile

FROM php:8.3-fpm

# Install required system packages
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip curl git \
    && docker-php-ext-install pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www

# Copy Laravel project (already has vendor locally)
COPY src/ ./

# Set permissions
RUN chown -R www-data:www-data /var/www

# Expose port (can change if needed)
EXPOSE 8000

# Run Laravel’s built-in server (for development)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
