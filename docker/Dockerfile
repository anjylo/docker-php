FROM php:8.0.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    unzip

# set php.ini
COPY ./php/php.ini /usr/local/etc/php/

# install composer 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY --from=composer/composer /usr/bin/composer /usr/bin/composer

# set user angelo with uid ang gid 1000
ARG USER=angelo
ARG UID=1000
ARG GID=1000
ARG PW=password

RUN useradd -m ${USER} --uid=${UID} && echo "${USER}:${PW}" | \
      chpasswd

USER ${UID}:${GID}

WORKDIR /var/www

# RUN composer install 

# RUN composer dump-autoload
