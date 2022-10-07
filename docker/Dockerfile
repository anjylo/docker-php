FROM php:8.0.2-fpm

# Set user angelo with uid ang gid 1000
ARG USER=angelo
ARG UID=1000
ARG GID=1000
ARG PW=password

RUN useradd -m ${USER} --uid=${UID} && echo "${USER}:${PW}" | \
      chpasswd

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY --from=composer/composer /usr/bin/composer /usr/bin/composer

USER ${UID}:${GID}

WORKDIR /var/www

# RUN composer install 

# RUN composer dump-autoload
