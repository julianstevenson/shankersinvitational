FROM php:5.6-apache
RUN docker-php-ext-install mysql mysqli \
 && printf "short_open_tag=On\ndisplay_errors=Off\nlog_errors=On\nerror_reporting=E_ALL & ~E_DEPRECATED & ~E_NOTICE\n" > /usr/local/etc/php/conf.d/shankers.ini \
 && a2enmod rewrite \
 && sed -ri "/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/" /etc/apache2/apache2.conf \
 && sed -ri 's/^Listen 80$/Listen 8080/' /etc/apache2/ports.conf \
 && sed -ri 's/<VirtualHost \*:80>/<VirtualHost *:8080>/' /etc/apache2/sites-available/000-default.conf
