# Use PHP 8.3 FPM base image
FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    gnupg2 \
    ca-certificates

# Add Microsoft repository for Debian 12 via .deb installer
RUN apt-get update && apt-get install -y curl gnupg2 \
    && curl -sSL https://packages.microsoft.com/config/debian/12/packages-microsoft-prod.deb -o packages-microsoft-prod.deb \
    && dpkg -i packages-microsoft-prod.deb \
    && rm packages-microsoft-prod.deb \
    && apt-get update \
    && ACCEPT_EULA=Y apt-get install -y \
       unixodbc \
       unixodbc-dev \
       msodbcsql18 \
       mssql-tools18 \
    && rm -rf /var/lib/apt/lists/*

# Configure ODBC
RUN echo "[ODBC Driver 18 for SQL Server]" > /etc/odbcinst.ini \
    && echo "Description=Microsoft ODBC Driver 18 for SQL Server" >> /etc/odbcinst.ini \
    && echo "Driver=/opt/microsoft/msodbcsql18/lib64/libmsodbcsql-18.*.so.1.1" >> /etc/odbcinst.ini \
    && echo "UsageCount=1" >> /etc/odbcinst.ini \
    && echo "Threading=1" >> /etc/odbcinst.ini \
    && echo "TrustServerCertificate=yes" >> /etc/odbcinst.ini \
    && echo "Encrypt=no" >> /etc/odbcinst.ini

# Install PHP extensions
RUN docker-php-ext-install pdo xml mbstring \
    && pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv

# Set working directory
WORKDIR /var/www

# Copy Laravel project
COPY src/ ./

# Set permissions
RUN chown -R www-data:www-data /var/www

# Expose port
EXPOSE 8000

# Start Laravel's development server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]