ARG VERSION

FROM php:${VERSION}-cli-alpine

WORKDIR /app

RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && apk del pcre-dev ${PHPIZE_DEPS}

RUN docker-php-ext-install -j$(nproc) bcmath

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

ENV XDEBUG_MODE=coverage
