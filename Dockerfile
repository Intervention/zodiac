# ##############################################
# stage: composer
# ##############################################
FROM composer:2 as composer

# install composer dependencies
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# ##############################################
# stage: testing
# ##############################################
FROM php:8-cli

# copy application
COPY . /app
COPY --from=composer /app/vendor/ /app/vendor/

# run tests
WORKDIR /app
CMD ./vendor/bin/phpunit -vvv
