<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainCotroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// index
Route::get('/', [MainCotroller::class, 'home'])
    -> name('home');

Route::get('/produts', [MainCotroller::class, 'products'])
    ->name('products');
