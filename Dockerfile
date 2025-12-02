FROM php:8.2-apache

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql mysqli

# Copy application
COPY . /var/www/html

# Change DocumentRoot to /var/www/html/public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Fix ports for Fly.io (Apache listens on 8080)
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf

EXPOSE 8080

CMD ["apache2-foreground"]
