<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function authors() {
        return $this->belongsToMany(Author::class);
    }
}
