# Gunakan base PHP image (Laravel compatible)
FROM php:8.2-apache

# Instal ekstensi dasar PHP
RUN docker-php-ext-install pdo pdo_mysql

# Copy semua file ke container
COPY ./src /var/www/html

# Set working directory
WORKDIR /var/www/html

# Expose port (harus sama dengan yang di docker-compose)
EXPOSE 8000

# Jalankan PHP server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/html"]
