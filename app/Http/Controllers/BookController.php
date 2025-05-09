<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::with(['author', 'publisher'])->get();
        $authors = Author::all();
        $publishers = Publisher::all();
        $editBook = null;

        $selectedAuthor = $request->selected_author;
        $selectedPublisher = $request->selected_publisher;

        if ($request->has('edit')) {
            $editBook = Book::find($request->edit);
        }

        return view('books', compact('books', 'authors', 'publishers', 'editBook', 'selectedAuthor', 'selectedPublisher'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'edition' => 'required',
            'copyright' => 'required|integer',
            'language' => 'required',
            'pages' => 'required|integer',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Libro agregado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'edition' => 'required',
            'copyright' => 'required|integer',
            'language' => 'required',
            'pages' => 'required|integer',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Libro eliminado correctamente.');
    }
}
