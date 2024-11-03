<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Import Auth

//Namespace Auth
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\InformasiController;
use App\Http\Controllers\admin\AgendaController;
use App\Http\Controllers\admin\GalerryController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\ProfilesekolaController;
use App\Http\Controllers\Auth\RegisterController;


//Namespace Admin
use App\Http\Controllers\Admin\AdminController;

//Namespace User
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;

/*
|--------------------------------------------------------------------------
// Web Routes
|--------------------------------------------------------------------------
// ...
*/

Route::view('/', 'welcome')->name('welcome');



Route::group(['namespace' => 'Admin','middleware' => 'auth','prefix' => 'admin'],function(){
	
	Route::get('/',[AdminController::class,'index'])->name('admin');


    //Route Rescource
    Route::resource('/user', 'UserController');
    Route::resource('/informasi', 'InformasiController');
    Route::resource('/Agenda', 'AgendaController');
    Route::resource('/gallery', 'GalleryController');
    Route::resource('/kategori', 'kategoriController');

   
});

Route::group(['namespace' => 'User', 'middleware' => 'auth', 'prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');
});

Route::group(['namespace' => 'Auth', 'middleware' => 'guest'], function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
});

Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


// Other
Route::view('/register', 'auth.register')->name('register');
Route::view('/forgot-password', 'auth.forgot-password')->name('forgot-password');
Route::post('/logout', function () {
    Auth::logout(); // Pastikan untuk memanggil logout
    return redirect()->to('/'); // Redirect ke halaman login
})->name('logout');


Route::resource('/profilesekola', 'ProfilesekolaController');