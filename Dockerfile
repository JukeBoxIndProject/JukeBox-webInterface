# Utilisez l'image PHP avec Apache
FROM php:apache

# Mettez à jour les paquets et installez le client MySQL
RUN apt-get update && \
    apt-get install -y default-mysql-client

# Installez les extensions PHP nécessaires pour Laravel
RUN docker-php-ext-install pdo_mysql

# Activez le module Apache mod_rewrite pour les URL propres de Laravel
RUN a2enmod rewrite

# Copiez les fichiers de l'application Laravel dans le conteneur
COPY . /var/www/html

# Définissez les autorisations correctes sur le dossier de l'application Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Installez les dépendances de l'application Laravel
RUN composer install --no-dev --optimize-autoloader

# Définissez l'environnement de production
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
ENV APP_ENV production

# Activez la configuration Laravel spécifique pour la production
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Redémarrez Apache pour appliquer les modifications
RUN service apache2 restart

# Exposez le port 80
EXPOSE 80

# Commande par défaut pour démarrer Apache
CMD ["apache2-foreground"]
