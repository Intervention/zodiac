FROM php:8.2-cli

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

# setup entrypoint
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
