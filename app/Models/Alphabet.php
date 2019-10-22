<?php

namespace App;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;

class Alphabet extends Model
{
    public function authors() {
        return $this->belongsToMany(Author::class, 'authors_alphabet');
    }
}
