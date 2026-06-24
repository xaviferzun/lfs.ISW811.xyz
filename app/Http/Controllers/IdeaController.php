<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::all();

        return view('ideas/index', [
            'ideas' => $ideas,
        ]);
    }

    public function create()
    {
        return view('ideas.create');
    }


    public function store(Request $request)
    {
       Idea::create([
        'description' => request('description'),
        'state' => 'pending',
    ]);
    return redirect('/ideas');  
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }


    public function edit(Idea $idea)
    {
        return view('ideas.edit', [
            'idea' => $idea,
        ]);
    }

    public function update(Request $request, Idea $idea)
    {
        $idea->update([
            'description' => request('description'),
        ]);
        return redirect('/ideas/' . $idea->id);
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect('/ideas');
    }
}
