# syntax=docker/dockerfile:1.4

FROM php:8.4-fpm as base

# Install PHP extensions using mlocati/php-extension-installer
RUN apt-get update && apt-get install -y curl gnupg && \
    curl -fsSL https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions > /usr/local/bin/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions opcache zip gd xsl dom exif intl pcntl bcmath sockets

# Install wkhtmltopdf dependencies
RUN apt-get update && apt-get install -y \
    libxrender1 \
    libxext6 \
    fontconfig-config \
    fontconfig \
    wkhtmltopdf

# Install WeasyPrint and dependencies
RUN apt-get install -y \
    python3 \
    python3-venv \
    python3-pip \
    libcairo2 \
    libpango-1.0-0 \
    libgdk-pixbuf2.0-0 \
    libffi-dev \
    && python3 -m venv /venv \
    && /venv/bin/pip install weasyprint

ENV PATH="/venv/bin:$PATH"

# User setup
ARG UID=1000
ARG GID=1000

RUN groupadd -g ${GID} podlodka && useradd --uid ${UID} --gid ${GID} --create-home --shell /bin/bash podlodka && \
    mkdir -p /home/podlodka/Downloads /app && \
    chown -R podlodka:podlodka /home/podlodka /app

WORKDIR /app

# Composer setup
COPY --chown=podlodka:podlodka --from=composer:2.8.8 /usr/bin/composer /usr/bin/composer
COPY --chown=podlodka:podlodka ./composer.* .

# PHP configuration
COPY --chown=podlodka:podlodka ./.docker/config/dev.ini /usr/local/etc/php/conf.d/dev.ini

USER podlodka

ENV COMPOSER_HOME="/tmp/composer"

RUN composer install --no-cache --no-ansi --no-autoloader --no-scripts

COPY --chown=podlodka:podlodka ./ .

RUN set -x && \
    composer dump-autoload -n --optimize && \
    chmod -R 777 ${COMPOSER_HOME}/cache