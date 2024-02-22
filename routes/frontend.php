<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');