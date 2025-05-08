<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        // Trae todos los autores con sus libros relacionados
        $authors = Author::with('books')->get();

        return view('authors', compact('authors'));
    }
}
