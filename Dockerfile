FROM php:apache

#Install the necessary PHP extensions for Laravel
RUN docker-php-ext-install pdo_mysql

#Enable Apache mod_rewrite modul for Laravel's own URL's
RUN a2enmod rewrite