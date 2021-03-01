FROM php:7.3-fpm

RUN curl -sS https://getcomposer.org/installer | php -- \
  --install-dir=/usr/bin/ --filename=composer

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

WORKDIR /code
