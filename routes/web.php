<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

//auth
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', function () { auth()->logout();
        return redirect(route('login'));})->name('logout');

    //Book controller
    Route::controller(BookController::class)->group(function (){
    Route::get('/admin', 'index')->name('admin');
    Route::get('/add', 'create')->name('book.create');
    Route::post('/store',  'store')->name('book.store');
    Route::get('/edit{book:id}', 'edit')->name('book.edit');
    Route::patch('/update{book:id}', 'update')->name('book.update');

    });
});

//value="{{old('title_en',$movie->getTranslation('title','en'))}}
