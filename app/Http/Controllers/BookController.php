<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\BookCategory;
use App\Category;
use App\Http\Requests\StoreBook;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all();

        // Filter by Author
        if (array_key_exists('author', $request->all())) {
            $author = Author::all()->where('name', $request->author)->first();
            $author_id = ($author)? $author->id : null;
            $books = $books->where('author_id', $author_id);
        }

        // Filter by Categories
        $bookCollection = [];
        $found = [];
        if (array_key_exists('category', $request->all())) {
            foreach ($books as $key => $book) {
                foreach ($book->Categories as $key2 => $category) {
                    if (in_array($category->category, $request->category) && ! in_array($book->id, $found)) {
                        $found[] = $book->id;
                        $bookCollection[] = $book;
                    }
                }
            }
        } else {
            $bookCollection = $books;
        }

        return new BookCollection($bookCollection);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function store(StoreBook $request)
    {
        $request = (object) $request->validated();

        // Create Author
        $dbAuthor = Author::where('name', $request->Author)->first();
        if (empty($dbAuthor)) {
            Author::create([
                'name' => $request->Author,
            ]);
        }

        // Create Category
        $categoryCSV = explode(',', $request->Category);
        foreach ($categoryCSV as $key => $category) {
            $category = trim($category);
            $dbCategory = Category::where('category', $category)->first();

            if (empty($dbCategory)) {
                Category::create([
                    'category' => $category,
                ]);
            }
        }

        // Create Book
        $bookCreated = Book::create([
            'isbn' => $request->ISBN,
            'author_id' => Author::select('id')->where('name', $request->Author)->first()->id,
            'title' => $request->Title,
            'price' => preg_replace("/[^0-9.]/", "", $request->Price),    // Match only the price - currency will always be assumed as GBP
        ]);

        // Create Book Category relationship
        foreach ($categoryCSV as $key => $category) {
            $category = trim($category);
            $dbCategory = Category::where('category', $category)->first();

            if (! empty($dbCategory)) {
                BookCategory::create([
                    'book_id' => $bookCreated->id,
                    'category_id' => $dbCategory->id,
                ]);
            }
        }

        return response()->json(new BookResource($bookCreated), 201);
    }

//    public function update(Request $request, Book $book)
//    {
//        $book->update($request->all());
//
//        return response()->json($book, 200);
//    }
//
//    public function delete(Request $request, Book $book)
//    {
//        $book->delete();
//
//        return response()->json(null, 204);
//    }
}
