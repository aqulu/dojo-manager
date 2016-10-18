# Dojo-Manager

Second approach to create a dojo-management software, formerly run as project "online-senpai".
Code-quality is still kinda crappy, since it's my first approch creating something with the Laravel framework.

## Prerequisites

    PHP 5.5 or newer
    composer
    Database of your choice (mariadb)

## Setup

    create database "dojo-manager"
    
    mkdir bootstrap/cache (composer install fails in my case, if I don't do this)
    composer install
    npm install
    php artisan migrate --seed
    gulp
    php arisan serve
