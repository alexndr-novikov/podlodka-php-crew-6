# syntax=docker/dockerfile:1.4
FROM surnet/alpine-wkhtmltopdf:3.20.2-0.12.6-full as wkhtmltopdf
FROM php:8.4-fpm-alpine

RUN  --mount=type=bind,from=mlocati/php-extension-installer:1.5,source=/usr/bin/install-php-extensions,target=/usr/local/bin/install-php-extensions \
     apk update && \
      install-php-extensions opcache zip gd xsl dom exif intl pcntl bcmath sockets && \
     apk add --no-cache libxrender libxext fontconfig && \
     apk del --no-cache  ${PHPIZE_DEPS} ${BUILD_DEPENDS}


WORKDIR /app

ARG UID=1000
ARG GID=1000

RUN addgroup -g ${GID} -S podlodka && adduser --uid ${UID} --ingroup podlodka -S -g podlodka podlodka && \
    mkdir -p /home/podlodka/Downloads /app \
    && chown -R podlodka:podlodka /home/podlodka \
    && chown -R podlodka:podlodka /app

COPY --from=wkhtmltopdf /bin/wkhtmltopdf /usr/local/bin/wkhtmltopdf

USER podlodka

ENV COMPOSER_HOME="/tmp/composer"

COPY --chown=podlodka:podlodka --from=composer:2.8.8 /usr/bin/composer /usr/bin/composer
COPY --chown=podlodka:podlodka ./composer.* .

RUN composer install --no-cache --no-ansi --no-autoloader --no-scripts

COPY --chown=podlodka:podlodka ./ .

RUN set -x && \
    composer dump-autoload -n --optimize && \
    chmod -R 777 ${COMPOSER_HOME}/cache

