#!/bin/bash

cd /app

# INSTALL DEPENDENCIES
composer install

# SETUP APP KEY
if [ ! -f /app/.env ]; then
    echo "APP_KEY=" >.env
    php artisan key:generate
fi

# WAIT FOR MYSQL
while ! curl -o - "$DB_HOST:$DB_PORT"; do sleep 1; done

# RUN MIGRATION
php artisan migrate --force
