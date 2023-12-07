# Dockerfile

# Utilisez l'image PHP avec Apache
FROM php:apache

# Installez le client MySQL
RUN apt-get update && \
    apt-get install -y default-mysql-client

#Install the necessary PHP extensions for Laravel
RUN docker-php-ext-install pdo_mysql

#Enable Apache mod_rewrite modul for Laravel's own URL's
RUN a2enmod rewrite