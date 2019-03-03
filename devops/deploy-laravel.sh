#!/usr/bin/env bash
if [ $(whoami) != "docker" ]; then
    echo "Must run as docker user"
    exit;
fi

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"

cd $(echo $DIR)/../ && composer install && php artisan migrate; php artisan db:seed
