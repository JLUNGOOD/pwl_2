<?php

use Illuminate\Support\Facades\Route;

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
// A
Route::get('/', function () {
    return "Selamat Pagi";
});

// B
Route::get('/about', function () {
    return "Nama : Alwan Aawi Nim : 2141720178";
});

// C
Route::get('/articles/{id}', function ($id) {
    return "Halaman Artikel dengan ID $id";
});