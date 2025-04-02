<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = [
            [
                'id' => 1,
                'author' => 'Abraham Silberschatz',
                'nationality' => 'Israelí / Americano',
                'birth_year' => 1952,
                'fields' => 'Database Systems, Operating Systems',
                'books' => [
                    ['id' => 1, 'title' => 'Operating System Concepts'],
                    ['id' => 2, 'title' => 'Database System Concepts']
                ]
            ],
            [
                'id' => 2,
                'author' => 'Andrew S. Tanenbaum',
                'nationality' => 'Holandés / Americano',
                'birth_year' => 1944,
                'fields' => 'Distributed computing, Operating Systems',
                'books' => [
                    ['id' => 3, 'title' => 'Computer Networks'],
                    ['id' => 4, 'title' => 'Modern Operating Systems']
                ]
            ],
        ];

        return view('authors', compact('authors'));
    }
}
