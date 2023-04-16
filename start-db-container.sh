#! /usr/bin/env bash
current_dir=$(realpath $(dirname $0));
container_name="shop-nw-db";
network=shop-nw
__port=3939


echo "Starting DB Container ${container_name}":
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
    -v $current_dir/main-db:/var/lib/mysql \
    -p $__port:3306 \
    --env-file $current_dir/db.env \
    mysql:5.7 \
    --sql-mode="";
