FROM php:7-fpm

RUN docker-php-ext-install pdo_mysql

COPY config/php.ini /usr/local/etc/php/

WORKDIR /var/www