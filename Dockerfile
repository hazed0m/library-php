FROM php:8.2-apache

# Install system libraries required for MySQL extensions
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql mysqli
