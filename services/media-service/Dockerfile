FROM php:8.2-fpm

WORKDIR /var/www/html

COPY ./src /var/www/html
COPY ./src/composer.lock /var/www/html/composer.lock
COPY ./src/composer.json /var/www/html/composer.json

RUN apt-get update && apt-get install -y \
    zip unzip curl \
    && docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

RUN composer install

CMD ["php-fpm"]
