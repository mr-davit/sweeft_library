<?php

use App\Http\Controllers\AuthController;
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



//guest
Route::middleware(['guest'])->group(function () {

    Route::get('/login', function () {
        return view('login');
    })->name('login.view');

    Route::post('/login', [AuthController::class, 'login'])->name('login');

});
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

//auth
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', function () { auth()->logout();
        return redirect(route('login'));})->name('logout');

});

