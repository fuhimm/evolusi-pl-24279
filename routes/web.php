<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', config('praktikum'));
})->name('home');

// Nama parameter dipaksa "tugas" karena singular dari "tugas" tidak beraturan.
Route::resource('tugas', TugasController::class)->parameters(['tugas' => 'tugas']);
