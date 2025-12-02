FROM php:8.2-apache

# Enable required PHP modules
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Apache document root
WORKDIR /var/www/html/public

# Copy project
COPY public/ /var/www/html/

# Allow .htaccess overrides
RUN a2enmod rewrite
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Change Apache to listen on 8080 (Koyeb requirement)
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf
RUN sed -i 's/:80/:8080/g' /etc/apache2/sites-enabled/000-default.conf

EXPOSE 8080

CMD ["apache2-foreground"]