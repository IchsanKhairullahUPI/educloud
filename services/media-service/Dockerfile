FROM php:8.2-apache
WORKDIR /var/www/html
COPY ./src /var/www/html
EXPOSE 8084
CMD ["php", "-S", "0.0.0.0:8084", "-t", "/var/www/html/src"]
