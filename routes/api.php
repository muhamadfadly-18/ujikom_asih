<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\AgendaController;

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
Route::get('/datainformasi', [InformasiController::class, 'getAllData']);
Route::get('/dataagenda', [AgendaController::class, 'getAllData']);
