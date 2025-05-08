<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['author', 'nationality', 'birth_year', 'fields'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
