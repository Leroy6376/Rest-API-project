FROM php:8.2.28-fpm

RUN apt-get update && apt-get install -y \
      apt-utils \
      curl \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      libgd-dev \
      git && \
      docker-php-ext-configure gd && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

WORKDIR /var/www

