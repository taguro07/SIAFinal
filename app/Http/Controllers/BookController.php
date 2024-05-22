<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel; // Import the Excel facade if you are using a package like Laravel Excel

class BookController extends Controller
{
    // public function book()
    // {
    //     $book = Book::orderBy('id')->get();

    //     return view('book.index', ['book' => $book]);
    // }

    public function book()
{
    $book = Book::orderBy('id')->get();
    Log::info('Books from DB: ', $book->toArray()); // Log the books for debugging
    return view('book.index', ['book' => $book]);
}


    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
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

        $book->update($request->all());
        return redirect('/book')->with('message', "$book->title has been updated.");
    }

    public function delete(Book $book)
    {
        $book->delete();

        return redirect('/book')->with('message', "$book->title has been deleted.");
    }

    public function generateCSV()
    {
        // Retrieve books from the database
        $books = Book::all();

        // Generate CSV filename
        $fileName = 'books_' . Str::slug(now(), '_') . '.csv';

        // Set CSV headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        // Create a CSV response
        return Response::stream(function () use ($books) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, ['ID', 'Title', 'Author', 'Description', 'Rental Fee']);

            // Insert CSV data
            foreach ($books as $book) {
                fputcsv($file, [
                    $book->id,
                    $book->title,
                    $book->author,
                    $book->description,
                    $book->rental_fee
                ]);
            }

            fclose($file);
        }, 200, $headers);
    }

    public function showImportForm()
    {
        return view('book.import');
    }

    public function importCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);
    
        $file = $request->file('csv_file');
        $fileHandle = fopen($file, 'r');
        $header = fgetcsv($fileHandle, 1000, ',');
    
        while ($row = fgetcsv($fileHandle, 1000, ','))
        {
            Log::info('CSV Row: ', $row); // Log the row for debugging
            // Map CSV columns to database fields
            $bookData = [
                'id' => is_numeric($row[0]) ? intval($row[0]) : null,
                'title' => $row[1],
                'author' => $row[2],
                'description' => $row[3],
                'rental_fee' => is_numeric($row[4]) ? floatval($row[4]) : 0,
            ];
    
            if (is_null($bookData['id'])) {
                unset($bookData['id']);
            }
    
            Book::updateOrCreate(['id' => $bookData['id']], $bookData);
        }
    
        fclose($fileHandle);
    
        return redirect('/book')->with('message', 'Books have been imported successfully');
    }
    
    
}
