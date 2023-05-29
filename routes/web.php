<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\Home2Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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
//Praktikum 1
// A
// Route::get('/', function () {
//     return "Selamat Pagi";
// });

// // B
// Route::get('/about', function () {
//     return "Nama : Alwan Alawi Nim : 2141720178";
// });

// // C
// Route::get('/articles/{id}', function ($id) {
//     return "Halaman Artikel dengan ID $id";
// });


//Praktikum 2
// Route::get('/', [PageController::class, 'index']);

// Route::get('/about', [PageController::class, 'about']);

// Route::get('/article/{id}', [PageController::class, 'article']);

// Route::get('/', [HomeController::class, 'index']);

// Route::get('/about', [AboutController::class, 'about']);

// Route::get('/article/{id}', [ArticleController::class, 'article']);


//PRAKTIKUM 3
// Route::prefix('product')->group(function(){
//     Route::get('/list',[PageController::class, 'product']);
// });

// Route::get('home', function(){
//     return "Selamat Datang Alwan";
// });

// Route::get('user/{id}', function($id){
//     echo "Daftar Berita : <br>
//     <ul>
//         <li>
//             <a href='https://www.educastudio.com/news'>Berita 1</a>

//         </li>
//         <li>
//             <a href='https://www.educastudio.com/news/educa-studio-berbagi-untuk-warga-sekitarterdampak-covid-19'>Berita 2</a>
//         </li>
//     </ul>
//     ";
//     return 'user'.$id;
// });

// Route::prefix('progam')->group(function(){
//     Route::get('/list',[PageController::class, 'progam']);
// });

// Route::get('/about', function(){
//     echo "<a href='https://www.educastudio.com/about-us'>Tentang Kami</a>";
// });

// Route::resource('contacUs',PageController::class);




//Minggu 3
//Praktikum 1
// Route::get('/',[Home2Controller::class, 'home']);

// Route::prefix('/product')->group(function(){
//     Route::get('/', [Home2Controller::class, 'product']);
// });

// Route::get('/news/{id}', [Home2Controller::class, 'news']);

// Route::prefix('/progam')->group(function () {
//     Route::get('/', [Home2Controller::class, 'progam']);
// });

// Route::get('/about', [Home2Controller::class, 'about']);

// Route::resource('/contact', contactController::class);

//Praktikum2

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->group(function(){
    Route::get('/', [DasboardController::class, 'index']);
    Route::get('/dasboard', [DasboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/pengalaman', [PengalamanController::class, 'index']);
    Route::get('/hobi', [HobiController::class, 'index']);

    Route::get('/kendaraan', [KendaraanController::class, 'index']);
    Route::get('/keluarga', [KeluargaController::class, 'index']);
    Route::get('/matkul', [MatkulController::class, 'index']);

    Route::get('articles/cetak_pdf',[ArticlesController::class, 'cetak_pdf']);
    Route::get('/mahasiswa/cetak_pdf/{id}', [MahasiswaController::class, 'cetak_pdf']);
    Route::resource('articles', ArticlesController::class);
    
    Route::resource('/mahasiswa', MahasiswaController::class)->parameter('mahasiswa', 'id');
    Route::post('/mahasiswa/data', [MahasiswaController::class, 'data']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/mahasiswa/{id}/nilai', [MahasiswaController::class, 'nilai']);
    Route::get('/mahasiswa/{id}/show', [MahasiswaController::class, 'show']);
});