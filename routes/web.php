<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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

Route::get('/uploadimage', [ImageController::class, 'showUploadForm'])->name('upload.form');
Route::post('/uploadimage', [ImageController::class, 'uploadImage'])->name('upload.image');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/upload', [ImageController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [ImageController::class, 'uploadImage'])->name('upload.image');

Route::get('/uploadimage', [ImageController::class, 'showUploadForm'])->name('upload.form');

