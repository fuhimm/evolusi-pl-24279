<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
use App\Models\Tugas;

Route::get('/tugas', function () {
    return response()->json(Tugas::latest()->get());
});
