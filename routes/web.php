<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', config('praktikum'));
})->name('home');
