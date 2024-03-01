<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Book $book){

        return view('welcome',[
            'books' => $book->get()->all(),
            'authors' => $book->authors()
        ]);
    }


}
