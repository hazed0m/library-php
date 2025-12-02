FROM php:8.2-apache

# Change Apache DocumentRoot to /var/www/html/public
ENV APACHE_DOCUMENT_ROOT=/var/www/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf \
    /etc/apache2/apache2.conf

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql mysqli

# # Fix ports for Fly.io (Apache listens on 8080)
# RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf

# EXPOSE 8080

CMD ["apache2-foreground"]