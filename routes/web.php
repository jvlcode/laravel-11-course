<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    // return view('welcome');
    return "Welcome to JVLcode Laravel course";
});

Route::get('/', [PostController::class, 'index'])->name('post.index');

Route::get('/post/{slug}', [PostController::class, 'detail'])->name('post.detail');

Route::get('/old-url', [PostController::class, 'oldUrl']);
Route::get('/new-url', [PostController::class, 'newUrl'])->name('new_url');

Route::get('/contact', [HomeController::class, 'contactForm'])->name('contact.show');
Route::post('/contact', [HomeController::class, 'submitContactForm'])->name('contact.store');
