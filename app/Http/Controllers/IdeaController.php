<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaRequest;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::query()->where('user_id', Auth::id())->get();

        return view('ideas/index', [
            'ideas' => $ideas,
        ]);
    }

    public function create()
    {
        return view('ideas.create');
    }


    public function store(IdeaRequest $request)
    {
        // request()->validate([
        //     'description' => ['required', 'min:10'],
        // ]);

        Idea::create([
            'description' => request('description'),
            'state' => 'pending',
            'user_id' => Auth::id(),
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

    public function update(IdeaRequest $request, Idea $idea)
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
