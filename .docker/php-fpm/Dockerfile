FROM composer as composer
FROM php:8.2-fpm-buster

ARG USER=gui
ARG UID=1000
ARG GID=1000

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive
ENV MKCERT_VERSION=1.4.3 \
    ARCH=${ARCH:-amd64}
# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get install -y git bash wget curl gnupg libbz2-dev zlib1g-dev zip libzip-dev libpng-dev libicu-dev libtidy-dev libpq-dev jpegoptim optipng pngquant gifsicle

RUN apt-get update && apt-get install -y libpng-dev libnss3-tools
RUN apt-get install -y \
    libwebp-dev \
    libjpeg62-turbo-dev \
    libpng-dev libxpm-dev \
    libfreetype6-dev

RUN docker-php-ext-configure gd

RUN apt-get update && apt-get install -y \
    libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
	&& docker-php-ext-enable imagick

# Install mkcert
RUN curl -L https://github.com/FiloSottile/mkcert/releases/download/v${MKCERT_VERSION}/mkcert-v${MKCERT_VERSION}-linux-${ARCH} -o ./mkcert
RUN docker-php-ext-install gd
RUN docker-php-ext-configure pcntl --enable-pcntl

RUN apt-get install -y ca-certificates
RUN docker-php-ext-install pdo_mysql pdo_pgsql bz2 intl zip exif pcntl
RUN pecl install redis && docker-php-ext-enable redis

# Install Nodejs and Yarn
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get update && apt-get install -y gcc g++ make nodejs
RUN npm install yarn --global
RUN apt-get update && apt-get install -y nginx

RUN docker-php-ext-install bcmath soap

WORKDIR "/app"
RUN mkdir -p app/storage
RUN chmod -R 775 app/storage

COPY --from=composer /usr/bin/composer /usr/bin/composer
EXPOSE 80


