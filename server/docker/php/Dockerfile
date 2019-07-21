FROM php:fpm

# For composer
RUN apt-get update \
    && apt-get install -y zlib1g-dev \
    && docker-php-ext-install zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set composer environment
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# Install laravel installer
RUN composer global require "laravel/installer"

# PHP's DB setting
RUN apt-get update \
     && apt-get install -y libpq-dev \
     && docker-php-ext-install pdo_mysql

# Install Node.js
RUN apt-get install -y --no-install-recommends gcc make libpng-dev
RUN apt-get install -y curl software-properties-common gnupg
RUN curl -sL https://deb.nodesource.com/setup_9.x | bash - \
    && apt-get update \
    && apt-get install -y nodejs

# Install vim
RUN apt-get install -y vim

# Install xdebug
ARG INSTALL_XDEBUG=true

RUN if [ ${INSTALL_XDEBUG} = true ]; then \
    pecl install xdebug && docker-php-ext-enable xdebug \
;fi

WORKDIR /var/www
