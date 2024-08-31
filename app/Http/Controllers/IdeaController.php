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
//        $this->authorize('idea.edit', $idea); // gate
        $this->authorize('update', $idea);
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Request $request,Idea $idea): RedirectResponse
    {
        $this->authorize('update', $idea);
        $data = ($request->validate([
                'content' => 'required|string'
        ]));

        $idea->update($data);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea was updated successfully');
    }

    public function destroy(Idea $idea): RedirectResponse
    {
//        $this->authorize('idea.delete', $idea); // gate
        $this->authorize('delete', $idea);
        $this->authorize('', $idea);
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea was deleted successfully');
    }

    public function like(Idea $idea): RedirectResponse
    {
        $user = auth()->id();
        $idea->likes()->attach($user);

        return redirect()->back();
    }

    public function unlike(Idea $idea): RedirectResponse
    {
        $user = auth()->id();
        $idea->likes()->detach($user);

        return redirect()->back();
    }
}
