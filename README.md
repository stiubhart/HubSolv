<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## HubSolv

Hubsolve - Web Developer - PHP - MySQL - Laravel - Glasgow - Perm - Backend Test

## Installation
Clone the repo

```
git clone git@github.com:stiubhart/hubsolv.git
```

Create a new database

Create a `.env` file

```
cp .env.example .env
```

Add your database connection information into the `.env` file

Install dependencies

```
composer install
```

Run Migrations

```
php artisan migrate
```

Seed the database

```
php artisan db:seed
```

You can also run your tests

```
composer test
```


## Dependencies 
- PHP >= 7.1.3
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension


## Assumptions
- I Assume I am able to get the information from the current online retailer in a JSON file and that file will be in the same format as in the table (i.e. capital letters in the table heading)
- Prices will always be in GBP
