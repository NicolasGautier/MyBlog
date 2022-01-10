<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UniqueActionController;

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

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/articles', [MainController::class, 'index'])->name('articles');

Route::get('/articles/{article:slug}', [MainController::class,'show'])->name('article');

Auth::routes();

Route::prefix('admin')->middleware('admin')->group(function(){
   //Autre manière de faire = Route ::resource('articles', ArticleController::class)->except(['show']) et renommer delete en destroy
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::delete('/articles/{article}/delete', [ArticleController::class, 'delete'])->name('articles.delete'); 
    Route::get('/articles/{article}/edit',  [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/articles/{article}/update', [ArticleController::class, 'update'])->name('article.update');
});

