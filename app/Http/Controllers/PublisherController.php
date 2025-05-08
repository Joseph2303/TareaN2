<?php

namespace App\Http\Controllers;

use App\Models\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        // Trae todas las editoriales con sus libros
        $publishers = Publisher::with('books')->get();

        return view('publishers', compact('publishers'));
    }
}
