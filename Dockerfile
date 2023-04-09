FROM php:7.4-apache

RUN service apache2 stop && \
    a2enmod rewrite && \
    a2enmod headers

RUN useradd theuser -m -p '09sjakfw_ka11sadf' && \
    usermod -aG theuser,root theuser

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN apt-get -y update && \
    apt-get -y install vim && \
    apt-get -y install git && \
    apt-get -y install curl
    
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN service apache2 start

