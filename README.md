<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

# HubSolv

Hubsolve - Web Developer - PHP - MySQL - Laravel - Glasgow - Perm - Backend Test

## Installation
Clone the repo

```
git clone https://github.com/stiubhart/hubsolv.git
```
Change working directory
```
cd hubsolv
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


## Endpoints
List all books: `GET``{BASE_URL}/api/book/`

Filter list:  `GET``{BASE_URL}/api/book/?author=Robin+Nixon&category[0]=PHP&category[1]=Javascript`

List all categories:  `GET``{BASE_URL}/api/category/`

Create a new book: `POST``{BASE_URL}/api/book`

    - `ISBN`
    
    - `Title`
    
    - `Author`
    - `Category` - Comma separated list of categories
    - `Price`

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
