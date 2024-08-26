<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IdeaController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = ($request->validate([
                'content' => 'required|string'
        ]));

        $data['user_id'] = auth()->id();

        Idea::create($data);

        return redirect()->route('dashboard')->with('success', 'Idea was created successfully');
    }

    public function show(Idea $idea): View
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea): View
    {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Request $request,Idea $idea): RedirectResponse
    {
        $data = ($request->validate([
                'content' => 'required|string'
        ]));

        $idea->update($data);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea was updated successfully');
    }

    public function destroy(Idea $idea): RedirectResponse
    {
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea was deleted successfully');
    }
}
