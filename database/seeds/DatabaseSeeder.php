<?php

use Illuminate\Database\Seeder;
use \App\Book;
use \App\Author;
use \App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Book::query()->delete();
        Category::query()->delete();
        Author::query()->delete();

        $this->call(AuthorTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BooksTableSeeder::class);
    }
}
