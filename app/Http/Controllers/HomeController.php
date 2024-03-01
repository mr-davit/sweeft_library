<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Book $book, Request $request){

        $order = request()->has('order') ? request('order') : 'desc';
        $search = $request->input('search');

        if ($request->has('search')){
            $book = Book::where('title', 'like', "%$search%")->orderBy('created_at',$order)->paginate();

            return view('welcome',[
                'books' => $book,
            ]);
        }

        return view('welcome',[
            'books' => $book->orderBy('created_at',$order)->paginate(25),
            'authors' => $book->authors()
        ]);
    }

    public function author (Author $author, Request $request) {

        $order = request()->has('order') ? request('order') : 'desc';
        $search = $request->input('search');

        if ($request->has('search')) {
            $author = Author::where('name', 'like', "%$search%")->orderBy('created_at', $order)->paginate();

            return view('authors', [
                'authors' => $author,
            ]);
        }

        return view('authors',[
           'authors' => $author->paginate()
        ]);

    }


}
