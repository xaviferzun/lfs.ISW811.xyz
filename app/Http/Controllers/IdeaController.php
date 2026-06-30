<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaRequest;
use Illuminate\Support\Facades\Gate;
use App\Notifications\IdeaPublished;

class IdeaController extends Controller
{
    public function index()
    {
        return view('ideas.index', [
            'ideas' => Auth::user()->ideas,
        ]);
    }

    public function create()
    {
        return view('ideas.create');
    }


    public function store(IdeaRequest $request)
    {
        $idea = Auth::user()->ideas()->create([
            'description' => request('description'),
            'state' => 'pending',
        ]);

        Auth::user()->notify(new IdeaPublished($idea));

        return redirect('/ideas');
    }

    public function show(Idea $idea)
    {
        //Episode 18
        Gate::authorize('update', $idea);

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

    public function update(IdeaRequest $request, Idea $idea)
    {
        Gate::authorize('update', $idea);

        $idea->update([
            'description' => request('description'),
        ]);
        return redirect('/ideas/' . $idea->id);
    }

    public function destroy(Idea $idea)
    {
        Gate::authorize('update', $idea);

        $idea->delete();
        return redirect('/ideas');
    }
}
