FROM php:7.4-fpm

RUN apt-get update
RUN apt-get install -y \
    mc \
    wget \
    htop \
    zlib1g-dev \
    libicu-dev \
    libzip-dev \
    librabbitmq-dev \
    libssh-dev \
    gettext-base \
    g++ \
    git \
    libmpdec-dev \
    libpng-dev \
    ghostscript && apt-get clean

RUN useradd -m docker && echo "docker:docker" | chpasswd

RUN docker-php-ext-configure pcntl \
    && docker-php-ext-install pcntl
RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl
RUN pecl install amqp \
    && docker-php-ext-enable amqp

RUN mkdir -p /www/app
RUN cd /www/app && wget https://getcomposer.org/installer && php installer && mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install zip mysqli pdo_mysql
