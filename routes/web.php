<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "<h1>Olá Mundo</h1>";
});

Route::get('/welcome/{name}', function ($name) {
    return "<h1>Bem Vindo $name</h1>";
});

