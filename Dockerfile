FROM wyveo/nginx-php-fpm:php81
COPY composer.lock composer.json /var/www/html/

WORKDIR /var/www
RUN composer install
CMD ["/start.sh"]