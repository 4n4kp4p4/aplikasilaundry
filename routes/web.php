<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/pegawai',\App\Http\Controllers\PegawaiController::class);