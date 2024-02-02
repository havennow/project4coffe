#!/bin/bash

cd .docker/php-fpm && docker build --build-arg UID=$(id -u) --build-arg GID=$(id -g) --build-arg USER=${USER} -t phpinstallp4c .
cd .. && docker-compose build --build-arg UID=$(id -u) --build-arg GID=$(id -g) --build-arg USER=${USER}
