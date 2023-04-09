#! /usr/bin/env bash
__current_folder=$(dirname $(realpath $0));
__container_name="shop";
__config_path=${__current_folder}/config/php;
__default_http_port=9292;

__the_network=shop-nw

echo "Create new network: "

docker network create -d bridge ${__the_network};

docker run --rm -ti \
    --name ${__container_name} \
    --network ${__the_network} \
    -v ${__config_path}/php.ini-production:/usr/local/etc/php/php.ini \
    -v ${__config_path}/etc/apache2/apache2.conf:/etc/apache2/apache2.conf \
    -v ${__config_path}/etc/apache2/sites-available/000-default.conf:/etc/apache2/sites-available/000-default.conf \
    -v ${__current_folder}/src:/var/www/html \
    -p ${__default_http_port}:80 \
    -w /var/www/html \
    hutgate/php74-dev;

# docker run --rm -ti --name gx-export --network shop-nw -v ${PWD}/config/php/php.ini-production:/usr/local/etc/php/php.ini -v ${PWD}/config/php/etc/apache2/apache2.conf:/etc/apache2/apache2.conf -v ${PWD}/config/php/etc/apache2/sites-available/000-default.conf:/etc/apache2/sites-available/000-default.conf -v ${PWD}/src:/var/www/html -p 9292:80 -w /var/www/html hutgate/php74-dev