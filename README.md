# [yoko.io test task]

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/installation)

Clone the repository

    git clone git@github.com:kosynka/yoko.io.testtask.git

Switch to the repo folder

    cd yoko.io.testtask

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:kosynka/yoko.io.testtask.git
    cd yoko.io.testtask
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

The api can be accessed at [http://localhost:8000/api/v1](http://localhost:8000/api/v1).

## API Specification

This application adheres to the api specifications set by the [Kosynka](https://github.com/kosynka).

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api/v1

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|

----------

The api endpoints in [Postman](https://api.postman.com/collections/21002700-12b44c80-fcfe-464e-bcfc-df3a49ef3a08?access_key=PMAT-01GX36T5KTFZEA99DZW6A7JJB9)

    https://api.postman.com/collections/21002700-12b44c80-fcfe-464e-bcfc-df3a49ef3a08?access_key=PMAT-01GX36T5KTFZEA99DZW6A7JJB9
