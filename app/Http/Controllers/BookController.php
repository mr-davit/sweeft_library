<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Book $book , Request $request)
    {

        $order = request()->has('order') ? request('order') : 'desc';
        $search = $request->input('search');

        if ($request->has('search')){
            $book = Book::where('title', 'like', "%$search%")->orderBy('created_at',$order)->paginate();

            return view('admin',[
                'books' => $book,
            ]);
        }


        return view('admin',[
            'books' => $book->orderBy('created_at',$order)->paginate(15),
            'authors' => $book->authors()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Author $author)
    {
        return view('book.add' ,[
            'authors' => $author->get()->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'title' => 'required|string',
            'year' => 'required|numeric',
            'status' => ['required', 'in:free,reserved']
        ]);

//        dd($validated['status']);
       $book = Book::create([
            'title' => $validated['title'],
            'year' => $validated['year'],
           'status' => $validated['status']

       ]);

        $book->authors()->sync($request->authors);

        return redirect(route('admin'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {

        return view('book.show',[
            'book' => $book,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Book $book, Author $author)
    {

        return view('book.edit',[
           'book' => $book,
            'selected' => $book->authors()->get(),
            'authors' => $author->get()->all()
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Book $book )
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'year' => 'required|numeric',
            'status' => ['required', 'in:free,reserved']
        ]);

        $book->update([
            'title' => $validated['title'],
            'year' => $validated['year'],
        ]);

        $book->authors()->sync($request->authors);

        return redirect(route('admin'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin');
    }

}
