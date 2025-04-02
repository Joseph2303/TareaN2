<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;

// Ruta principal redirige a la lista de libros
Route::get('/', [BookController::class, 'index']);

// Libros
Route::get('/books', [BookController::class, 'index']);

// Autores
Route::get('/authors', [AuthorController::class, 'index']);

// Editoriales
Route::get('/publishers', [PublisherController::class, 'index']);
