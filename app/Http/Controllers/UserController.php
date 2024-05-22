<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use League\Csv\Writer;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function name()
    {
        $users = User::orderBy('id')->get();
        return view('user.index', ['users' => $users]);
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('/user')->with('message', 'A new user has been added');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user -> update($request->all());
        return redirect('/user')->with('message', "$user->name has been updated.");
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect('/user')->with('message', "$user->name has been deleted.");
    }

    public function index()
    {
        $users = User::all();
        return view('index', compact('users'));
    }

    public function pdf()
    {
        $users = User::latest()->get();
        $pdf = Pdf::loadView('user/pdf', ['users' => $users]);

        return $pdf->download('users-list.pdf', $pdf);
    }

    public function generateCSV()
    {
        // Retrieve users from the database
        $users = User::all();

        // Generate CSV filename
        $fileName = 'users_' . Str::slug(now(), '_') . '.csv';

        // Set CSV headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        // Create a CSV response
        return Response::stream(function () use ($users) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, ['ID', 'Name', 'Email']);

            // Insert CSV data
            foreach ($users as $user) {
                fputcsv($file, [
                    $user->id,
                    $user->name,
                    $user->email
                ]);
            }

            fclose($file);
        }, 200, $headers);
    }

    // public function generateCSV() {
    //     $users = User::orderBy('name')->get();
    //     $filename = '../storage/users.csv';
    //     $file = fopen($filename, 'w+');

    //     foreach($users as $user) {
    //         fputcsv($file, [
    //             $user->id,
    //             $user->name,
    //             $user->email,
    //         ]);
    //     }

    //     fclose($file);
    //     return response()->download($filename);
    // }


    
}
