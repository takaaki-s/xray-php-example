FROM php:7.3.8-fpm-alpine
RUN apk update && apk upgrade && apk add \
    zip \
    unzip \
    && docker-php-ext-install \
    pdo_mysql \
    sockets \
    opcache \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
