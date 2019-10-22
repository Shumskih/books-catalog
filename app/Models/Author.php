<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'authors_books');
    }

    public function alphabet()
    {
        return $this->belongsTo('App\Models\Alphabet');
    }
}
