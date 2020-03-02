<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected $fillable = [
        'isbn',
        'title',
        'price',
        'author_id'
    ];

    /** One-to-many Relations */

    public function Author()
    {
        return $this->hasOne('App\Author', 'id', 'author_id');
    }


    /** Many-to-many Relations */

    public function Categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }


    /** Many-tooOne Relations */
}
