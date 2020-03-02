<?php

use Illuminate\Database\Seeder;
use \App\Author;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = File::get("database/data/books.json");
        $authors = json_decode($authors);

        foreach ($authors as $key => $author) {
            $dbAuthor = Author::where('name', $author->Author)->first();
            if (! empty($dbAuthor)) continue;

            Author::create([
                'name' => $author->Author,
            ]);
        }
    }
}
