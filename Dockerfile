FROM php:8.2-apache

COPY . /var/www/html/

RUN if [ -f /var/www/html/index1.php ]; then cp /var/www/html/index1.php /var/www/html/index.php; fi

EXPOSE 80
