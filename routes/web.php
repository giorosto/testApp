<?php

use App\Http\Controllers\Guest\BlogController;
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

Route::get('/', [Blogcontroller::class, 'index'])->name('index');
Route::get('/blog/{slug}.{id}', [Blogcontroller::class, 'show'])->where('id','[0-9]+')->name('show');
Route::get('/category/{slug}.{category_id}', [Blogcontroller::class, 'show'])->where('category_id','[0-9]+')->name('byCategory');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



