<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;

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
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $clients = \App\Models\Client::all(); // Retrieve all clients from the database
        return view('dashboard', compact('clients')); // Pass clients to the view
    })->name('dashboard');
});

//Route::get('/dashboard', [DashboardController::class, 'index']);

// Create additional Routes below
Route::get('/login', [AuthController::class, 'create'])->name('login.create');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');

// Display form to add a new client
Route::get('/clients/add', [ClientController::class, 'create'])
    ->middleware('auth')
    ->name('clients.create');


// Process form submission and save new client
Route::post('/clients', [ClientController::class, 'store'])
    ->middleware('auth')
    ->name('clients.store');

    Route::get('/clients', [ClientController::class, 'index'])
    ->middleware('auth')
    ->name('clients.index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


  
    