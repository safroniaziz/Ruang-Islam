<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IstilahController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WelcomeController;
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
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/cari_istilah/{id}', [WelcomeController::class, 'cariIstilah'])->name('cari_istilah');


Auth::routes();

// Route::group(['prefix'  => 'administrator/'],function(){
//     Route::get('/dashboard',[HomeController::class, 'index'])->name('administrator.unit');
// });

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix'  => 'kategori/'],function(){
    Route::get('/',[KategoriController::class, 'kategori'])->name('kategori');
    Route::post('/',[KategoriController::class, 'post'])->name('kategori.post');
    Route::get('/{id}/edit',[KategoriController::class, 'edit'])->name('kategori.edit');
    Route::patch('/',[KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/',[KategoriController::class, 'delete'])->name('kategori.delete');
});

Route::group(['prefix'  => 'istilah/'],function(){
    Route::get('/',[IstilahController::class, 'istilah'])->name('istilah');
    Route::post('/',[IstilahController::class, 'post'])->name('post');
    Route::get('/{id}/edit',[IstilahController::class, 'edit'])->name('edit');
    Route::patch('/',[IstilahController::class, 'update'])->name('update');
    Route::delete('/',[IstilahController::class, 'delete'])->name('delete');
});