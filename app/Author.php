<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';
    protected $fillable = ['name', 'book_id'];

    /** One-to-many Relations */


    /** Many-to-many Relations */


    /** Many-to- One Relations */
    public function Books()
    {
        return $this->hasMany('App\Book', 'id', 'book_id');
    }
}
