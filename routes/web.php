<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
}); 

Route::get('/user', [UserController::class, 'name'])->name('users');
Route::get('/user/create', [UserController::class, 'create'])->name('user');
Route::post('/user/create', [UserController::class, 'store'])->name('user');
Route::get('/user/{user}', [UserController::class, 'edit']);
Route::post('user/{user}', [UserController::class, 'update']);
Route::delete('/user/delete/{user}', [UserController::class, 'delete']);

Route::get('/book', [BookController::class, 'book'])->name('books');
Route::get('/book/create', [BookController::class, 'create'])->name('book');
Route::post('/book/create', [BookController::class, 'store'])->name('book');
Route::get('/book/{book}', [BookController::class, 'edit']);
Route::post('book/{book}', [BookController::class, 'update']);
Route::delete('/book/delete/{book}', [BookController::class, 'delete']);

Route::get('/rental', [RentalController::class, 'rental'])->name('rentals');
Route::get('/rental/create', [RentalController::class, 'create'])->name('rental');
Route::post('/rental/create', [RentalController::class, 'store'])->name('rental');
Route::get('/rental/{rental}', [RentalController::class, 'edit']);
Route::post('rental/{rental}', [RentalController::class, 'update']);
Route::delete('/rental/delete/{rental}', [RentalController::class, 'delete']);