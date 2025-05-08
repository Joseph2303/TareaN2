<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['publisher', 'country', 'founded', 'genre'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}

