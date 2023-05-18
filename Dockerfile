FROM php:8.2-fpm-alpine3.17

RUN apk add --no-cache git bash --update linux-headers $PHPIZE_DEPS \
    && pecl install pcov \
    && docker-php-ext-enable pcov

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.5.5

WORKDIR /var/www
RUN rm -rf /var/www/html
RUN ln -s public html

EXPOSE 9000
ENTRYPOINT [ "php-fpm" ]