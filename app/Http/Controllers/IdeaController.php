<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(Request $request)
    {
        $data = ($request->validate([
                'content' => 'required|string'
        ]));

        Idea::create($data);

        return redirect()->route('dashboard')->with('success', 'Idea was created successfully');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Request $request,Idea $idea)
    {
        $data = ($request->validate([
                'content' => 'required|string'
        ]));

        $idea->update($data);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea was updated successfully');
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea was deleted successfully');
    }
}
