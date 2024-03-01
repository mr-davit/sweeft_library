<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Book $book){

        return view('welcome',[
            'books' => $book->paginate(25),
            'authors' => $book->authors()
        ]);
    }

    public function author (Author $author) {

        return view('authors',[
           'authors' => $author->paginate()
        ]);

    }


}
