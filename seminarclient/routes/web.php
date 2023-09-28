<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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
/*
Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/*

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::get('/', 'HomeController@index')->name('home');
Route::get('/register', 'RegisterController@index')->name('register');
Route::get('/login', 'LoginController@index')->name('login');

Route::post('/login', 'Auth\LoginController@login')->name('login.perform');
Route::get('/reset-password', 'ResetPasswordController@index')->name('reset-password');


Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::post('/login', 'Auth\LoginController@login')->name('login.perform');




Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'HomeController@index');

Route::get('/dashboard', function () {
    return view('pages/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('/notes', NoteController::class )->middleware('auth');
Route::get('/', 'HomeController@index')->name('home');

Route::post('/login', 'Auth\LoginController@login')->name('login.perform');
Route::get('/reset-password', 'ResetPasswordController@index')->name('reset-password');
Route::get('/profile', 'ProfileController@index')->name('profile');
//Route::get('/your-route-uri', 'YourController@yourMethod')->name('page');
Route::post('/register', 'Auth\RegisterController@register')->name('register.perform');


require __DIR__.'/auth.php';