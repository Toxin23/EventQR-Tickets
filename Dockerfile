FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    php-mysql \
    && docker-php-ext-install pdo_mysql

WORKDIR /var/www/html
COPY . .
EXPOSE 80
