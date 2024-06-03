<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Project : LAZIM
DB : lazim
LARAVEL VERSION : 9

## SEEDS COMMAND FOR RUN :

php artisan db:seed --class=CreateUsersSeeder
php artisan db:seed --class=TaskTableSeeder

## API URLs :

 POST      api/login : http://127.0.0.1:8000/Api\AuthController@login
 GET|HEAD  api/logout  http://127.0.0.1:8000/  Api\AuthController@logout
 POST      api/register http://127.0.0.1:8000/  Api\AuthController@register
 POST      api/task/add http://127.0.0.1:8000/  Api\TaskController@store
 GET|HEAD  api/task/list http://127.0.0.1:8000/  Api\TaskController@list
 DELETE  api/task/{id}/delete  http://127.0.0.1:8000/ Api\TaskController@destroy
 GET|HEAD  api/task/{id}/edit ............................................................... Api\TaskController@edit
 PUT      http://127.0.0.1:8000/ api/task/{id}/update Api\TaskController@update
