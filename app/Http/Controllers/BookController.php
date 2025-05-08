<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        // Trae todos los libros con su autor y editorial
        $books = Book::with(['author', 'publisher'])->get();

        return view('books', compact('books'));
    }
}
