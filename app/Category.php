<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['category'];

    /** One-to-many Relations */


    /** Many-to-many Relations */

    public function Book()
    {
        return $this->belongsToMany(Book::class, 'book_category');
    }


    /** Many-to-One Relations */

}
