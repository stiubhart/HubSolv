<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\BookCategory;
use App\Category;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = File::get("database/Data/books.json");
        $books = json_decode($books);

        foreach ($books as $key => $book) {

            $bookCreated = Book::create([
                'isbn' => $book->ISBN,
                'author_id' => \App\Author::select('id')->where('name', $book->Author)->first()->id,
                'title' => $book->Title,
                'price' => preg_replace("/[^0-9.]/", "", $book->Price),    // Match only the price - currency will always be assumed as GBP
            ]);

            $categoryCSV = explode(',', $book->Category);
            foreach ($categoryCSV as $key2 => $category) {
                $category = trim($category);
                $dbCategory = Category::where('category', $category)->first();

                if (empty($dbCategory)) continue;

                BookCategory::create([
                    'book_id' => $bookCreated->id,
                    'category_id' => $dbCategory->id,
                ]);
            }
        }
    }
}
