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

// delete
Route::get('/delete/product/{product}', [MainCotroller::class, 'delete'])
    ->name('delete.product');

// create
Route::get('/create/product', [MainCotroller::class, 'create'])
    ->name('create.product');
Route::post('/store/product', [MainCotroller::class, 'store'])
    ->name('store.product');

// edit
Route::get('/edit/product/{product}', [MainCotroller::class, 'edit'])
    ->name('edit.product');
Route::post('/update/product/{product}', [MainCotroller::class, 'update'])
    ->name('update.product');


