<?php

use Illuminate\Support\Facades\Route;

//FORMS
Route::get('/', function () {
    $ideas = session()->get('ideas', []);

    return view('ideas', [
        'ideas' => $ideas,
    ]);
});

//POST IDEAS
Route::post('/ideas', function () {
    $idea = request('idea');

    session()->push('ideas', $idea);
    return redirect('/');
});

//DELETE IDEAS
Route::get('/delete-ideas', function () {
    session()->forget('ideas');
    return redirect('/');
});