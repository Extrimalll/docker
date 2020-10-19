FROM php:7.3-apache 

RUN apt-get update && apt-get install -y \
        curl \
        wget \
        git \
        zip \
        libzip-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libxslt-dev \
        libicu-dev \
        libmcrypt-dev \
        libpng-dev \
        libxml2-dev \
        libpq-dev \
        apt-utils\
    && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip

RUN apt-get update -y
RUN apt-get install -y libmcrypt-dev
RUN pecl install mcrypt-1.0.2
RUN docker-php-ext-enable mcrypt

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-install xsl
RUN docker-php-ext-install soap

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer