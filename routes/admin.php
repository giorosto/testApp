<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/**
 * --------------------------------------------------------------------------
 * Admin Routes
 * --------------------------------------------------------------------------
 *
 */
Route::name('admin.')->group(function(){
    Route::get('index', [BlogController::class,'index'])->name('index');
    Route::prefix('blog')->name('blog.')->group(function(){
        Route::get('create', [BlogController::class,'index'])->name('create');
        Route::post('store', [BlogController::class,'store'])->name('store');
        Route::get('edit/{id}', [BlogController::class,'edit'])->name('edit');
        Route::post('update', [BlogController::class,'update'])->name('update');
        Route::post('delete', [BlogController::class,'delete'])->name('delete');
        Route::get('view', [BlogController::class,'view'])->name('view');
    });

    Route::middleware(["role:admin"])->group(function(){
        Route::prefix('users')->name('users.')->group(function(){
            Route::get('/', [UserController::class,'index'])->name('index');
            Route::post('update', [UserController::class,'update'])->name('update');
        });
    });
});

