#!/bin/bash

php artisan migrate:refresh --seed

php artisan passport:install

php artisan  l5-swagger:generate
