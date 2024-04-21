# syntax=docker/dockerfile:1.4

ARG DISTRIB_CODENAME=latest

FROM ubuntu:${DISTRIB_CODENAME}

ARG DEBIAN_FRONTEND="noninteractive"
ARG PHP_VERSION
ARG TARGETARCH

COPY --link --from=composer:2.2 /usr/bin/composer /usr/local/bin/composer

RUN --mount=type=cache,sharing=locked,target=/var/cache/apt,id=apt-cache-${TARGETARCH} \
    --mount=type=cache,sharing=locked,target=/var/lib/apt,id=apt-lib-${TARGETARCH} \
    --mount=type=tmpfs,target=/tmp set -o errexit -o xtrace; \
    apt-get --yes --quiet update; \
    apt-get --yes --quiet install software-properties-common; \
    add-apt-repository --yes ppa:ondrej/php

RUN --mount=type=cache,sharing=locked,target=/var/cache/apt,id=apt-cache-${TARGETARCH} \
    --mount=type=cache,sharing=locked,target=/var/lib/apt,id=apt-lib-${TARGETARCH} \
    --mount=type=tmpfs,target=/tmp set -o errexit -o xtrace; \
    apt-get --yes --quiet update; \
    apt-get --yes --quiet install --no-install-recommends \
      php${PHP_VERSION}-cli \
      php${PHP_VERSION}-curl \
      php${PHP_VERSION}-dom \
      php${PHP_VERSION}-mbstring \
      php${PHP_VERSION}-zip \
      unzip; \
    cp --archive /etc/skel /var/www; \
    chown --recursive www-data:www-data /var/www

USER www-data

WORKDIR /var/www
