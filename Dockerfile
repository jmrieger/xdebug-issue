FROM php:7.3.3-fpm

RUN apt-get update -y \
    && apt-get install -y apt-utils \
    && apt-get upgrade -y \
    && apt-get install
RUN apt-get install -y iputils-ping git zip unzip

RUN pear -v

# Install our PECL packages
RUN yes | pecl install xdebug

# Install and enable these extensions
RUN docker-php-ext-enable xdebug

RUN mkdir -p /opt/phpunit && cd /opt/phpunit

WORKDIR /opt/phpunit

RUN git clone https://github.com/sebastianbergmann/phpunit .

RUN tools/composer install

COPY ./phpunit /opt/phpunit

CMD ./phpunit --coverage-text tests/unit/Util/JsonTest.php