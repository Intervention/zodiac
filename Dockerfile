FROM php:8.0-cli

RUN apt update \
        && apt install -y \
            libicu-dev \
            git \
            zip \
        && pecl install xdebug \
        && docker-php-ext-enable \
            xdebug \
        && docker-php-ext-install \
            intl \
        && apt-get clean

# install composer
#
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
