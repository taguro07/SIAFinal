<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function rental()
    {
        $rent = Rental::orderBy('id')->get();

        return view('rental.index',['rental' => $rent]);
    }

    public function create(){
        $users =  User::list();
        return view('rental.create', ['users' => $users]);

    }
    public function store(Request $request){
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'rental_date' => 'required',
            'return_date' => 'required'
        ]);

        Rental::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'rental_date' => $request->rental_date,
            'return_date' =>$request->return_date
        ]);
        return redirect('/rental')->with('message', 'A new rental has been added');
    }

    public function edit(Rental $rental)
    {
        return view('rental.edit', compact('rental'));
    }

    public function update(Rental $rental, Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'rental_date' => 'required',
            'return_date' => 'required'
        ]);

        $rental -> update($request->all());
        return redirect('/rental')->with('message', "$rental->user_id has been updated.");
    }

    public function delete(Rental $rental)
    {
        $rental->delete();

        return redirect('/rental')->with('message', "$rental->user_id has been deleted.");
    }


}
