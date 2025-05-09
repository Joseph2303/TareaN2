<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;

// Ruta principal redirige a la lista de libros
Route::get('/', [BookController::class, 'index']);

// CRUD de Libros (todo desde la vista books.blade.php)
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

// Autores
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');

// Editoriales
Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers.index');