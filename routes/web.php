<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageMergeController;

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
Route::get('/', [ImageMergeController::class, 'display'])->name('display.images');
Route::get('/api/images', [ImageMergeController::class, 'apiDisplay'])->name('api.images');

// Route::get('/', function () {
//     return view('image-combiner');
// })->name('home');

// Route::get('/combine-images', [ImageMergeController::class, 'combine'])->name('combine.images');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/merge-form', [ImageMergeController::class, 'index']);
// Route::get('/merge-images', [ImageMergeController::class, 'merge']);
