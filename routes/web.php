<?php

use Illuminate\Support\Facades\Route;
use App\Models\Idea;

//FORMS
Route::get('/', function () {
    // $ideas = Idea::where('state', 'pending')->get();
    $ideas = Idea::query()
        ->when(request('state'), function ($query, $state) {
            $query->where('state', $state);
        })
        ->get();

    return view('ideas', [
        'ideas' => $ideas,
    ]);
});

//POST IDEAS
Route::post('/ideas', function () {
    Idea::create([
        'description' => request('idea'),
        'state' => 'pending',
    ]);
    return redirect('/');
});

//DELETE IDEAS
Route::get('/delete-ideas', function () {
    session()->forget('ideas');
    return redirect('/');
});