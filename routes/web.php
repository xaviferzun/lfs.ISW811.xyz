<?php

use Illuminate\Support\Facades\Route;
use App\Models\Idea;

//FORMS
Route::get('/ideas', function () {
    // $ideas = Idea::where('state', 'pending')->get();
    $ideas = Idea::all();

    return view('ideas/index', [
        'ideas' => $ideas,
    ]);
});

//show ideas
Route::get('/ideas/{idea}', function (Idea $idea) {
    return view('ideas.show', [
        'idea' => $idea,
    ]);
});

//edit ideas 
Route::get('/ideas/{idea}/edit', function (Idea $idea) {
    return view('ideas.edit', [
        'idea' => $idea,
    ]);
});

// update ideas
Route::patch('/ideas/{idea}/edit', function (Idea $idea) {
    $idea->update([
        'description' => request('description'),
    ]);
    return redirect('/ideas/' . $idea->id);
});

//POST IDEAS
Route::post('/ideas', function () {
    Idea::create([
        'description' => request('description'),
        'state' => 'pending',
    ]);
    return redirect('/');
});

//Destroy
Route::delete('/ideas/{idea}', function (Idea $idea) {
    $idea->delete();
    return redirect('/ideas');
});

