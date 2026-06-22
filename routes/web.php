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

//PASS DATA TO VIEWS
// Route::get('/', function () {
//     return view('welcome', [
//         'greeting' => 'Bienvenido a mi sitio web',
//         'person' => request('person', 'Mundo'),
//     ]);
// });

//BLADE DIRECTIVES
Route::get('/', function () {
    return view('welcome', [
        'tasks' => [
            'Hacer la compra',
            'Limpiar la casa',
            'Pasear al perro',
        ],
    ]);
});