<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = [
            [
                'id' => 1,
                'publisher' => 'John Wiley & Sons',
                'country' => 'United States',
                'founded' => 1807,
                'genre' => 'Academic',
                'books' => [
                    ['id' => 1, 'title' => 'Operating System Concepts'],
                    ['id' => 2, 'title' => 'Database System Concepts']
                ]
            ],
            [
                'id' => 2,
                'publisher' => 'Pearson Education',
                'country' => 'United Kingdom',
                'founded' => 1844,
                'genre' => 'Education',
                'books' => [
                    ['id' => 3, 'title' => 'Computer Networks'],
                    ['id' => 4, 'title' => 'Modern Operating Systems']
                ]
            ],
        ];

        return view('publishers', compact('publishers'));
    }
}
