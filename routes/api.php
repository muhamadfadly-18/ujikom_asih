<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/datagallery', [GalleryController::class, 'getAllData']);
Route::post('/gallery', [GalleryController::class, 'storedata']);
Route::put('/datagallery/{id}', [datagalleryController::class, 'updatedata']);
Route::delete('/datagallery/{id}', [GalleryController::class, 'destroydata']);


Route::get('/datainofrmasi', [InformasiController::class, 'getAllData']);
Route::post('/informasi', [InformasiController::class, 'storedata']);
Route::put('/datainofrmasi/{id}', [InformasiController::class, 'updatedata']);
Route::delete('/datainofrmasi/{id}', [InformasiController::class, 'destroydata']);

Route::get('/dataagenda', [AgendaController::class, 'getAllData']);
Route::post('/agenda', [AgendaController::class, 'storedata']);
Route::put('/dataagenda/{id}', [AgendaController::class, 'updatedata']);
Route::delete('/dataagenda/{id}', [AgendaController::class, 'destroydata']);

Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'regis']);


use App\Http\Controllers\MediaController;

Route::get('/datamedia', [MediaController::class, 'getAllMedia']);
