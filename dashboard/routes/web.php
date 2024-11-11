<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index'); // Route untuk halaman utama
});

Route::get('/deskripsi', function () {
    return view('deskripsi'); // Route untuk halaman deskripsi
});

Route::get('/table', 'App\Http\Controllers\detection_controller@index');
