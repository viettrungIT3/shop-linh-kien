#! /usr/bin/env bash



current_dir=$(realpath $(dirname $0));
container_name="shop-nw-db";
network=shop-nw
__port=3939


echo "Starting DB Contianer":
echo "=============================";

echo "1. drop the current one";
docker stop ${container_name};

echo "2. Create network";
docker network create -d bridge ${network};


echo "3. Start  container :";

docker run --rm -ti -d \
    --name $container_name \
    --network $network \
    -v $current_dir/db:/backup \
    -v $current_dir/mysql-db:/var/lib/mysql \
    -p $__port:3306 \
    -e MYSQL_ROOT_PASSWORD=qdtjozdvhm1@ \
    -e MYSQL_PASSWORD=20akaksdf29adfjaksdf__@ \
    -e MYSQL_USER=admin \
    -e MYSQL_DATABASE=gw_export_nw_db \
    mysql:5.7 \
    --sql-mode=""

# docker run --rm -ti -d --name shop-nw-db --network shop-nw -v ${PWD}/db:/backup -v ${PWD}/mysql-db:/var/lib/mysql -p 3939:3306 -e MYSQL_ROOT_PASSWORD="qdtjozdvhm1@" -e MYSQL_PASSWORD="20akaksdf29adfjaksdf__@" -e MYSQL_USER="admin" -e MYSQL_DATABASE="gw_export_nw_db"  mysql:5.7 --sql-mode=""