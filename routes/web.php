<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

//Misma forma de hacerlo

// Route::view('/about', 'about');
// Route::view('/contact', 'contact');

// Route::view('/', 'welcome', [
//     'greeting' => 'Bienvenido a mi sitio web',
//     'person' => request('person')
// ]);

Route::get('/', function () {
    return view('welcome', [
        'greeting' => 'Bienvenido a mi sitio web',
        'person' => request('person', 'Mundo'),
    ]);
});