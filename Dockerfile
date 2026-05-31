FROM php:8.2-cli-alpine

RUN apk add --no-cache \
        icu-dev \
        git \
        zip \
    && docker-php-ext-install \
        intl

# install composer
#
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# setup entrypoint
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
