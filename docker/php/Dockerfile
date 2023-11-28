FROM php:8.2-fpm-alpine

# Symfony CLI
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | sh

RUN apk update && apk add \
    libzip-dev \
    libxslt-dev \
    icu-dev \
    oniguruma-dev \
    symfony-cli

RUN docker-php-ext-install \
    pdo pdo_mysql zip xsl intl opcache exif mbstring

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd pdo pdo_mysql xdebug apcu intl zip bcmath curl opcache xml sodium exif mbstring

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer