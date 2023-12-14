<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function book()
    {
        $book = Book::orderBy('id')->get();

        return view('book.index',['book' => $book]);
    }
    public function create(){
        return view('book.create');

    }
    public function store(Request $request){
        $request->validate([
            'title'         => 'required',
            'author'        => 'required',
            'description'   => 'required',
            'rental_fee'    => 'required'
        ]);

        Book::create([
            'title'         => $request->title,
            'author'        => $request->author,
            'description'   => $request->description,
            'rental_fee'    => $request->rental_fee
        ]);
        return redirect('/book')->with('message', 'A new book has been added');
    }

    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    public function update(Book $book, Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'author'        => 'required',
            'description'   => 'required',
            'rental_fee'    => 'required'
        ]);

        $book -> update($request->all());
        return redirect('/book')->with('message', "$book->title has been updated.");
    }

    public function delete(Book $book)
    {
        $book -> delete();

        return redirect('/book')->with('message', "$book->title has been deleted.");
    }
}
