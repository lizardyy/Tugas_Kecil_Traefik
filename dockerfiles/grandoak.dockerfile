FROM php:8-fpm-alpine

WORKDIR /var/www/html/

RUN docker-php-ext-install pdo pdo_mysql

EXPOSE 8082

CMD php -S 0.0.0.0:8082 -t public