FROM php:8-fpm-alpine

WORKDIR /var/www/html/

RUN docker-php-ext-install pdo pdo_mysql

EXPOSE 8083

# CMD ["/usr/local/bin/php", "-S", "http://0.0.0.0:8083 ", "-t", "public"]
CMD php -S 0.0.0.0:8083 -t public