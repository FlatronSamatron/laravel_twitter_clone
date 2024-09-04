<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IdeaController extends Controller
{
    public function store(CreateIdeaRequest $request): RedirectResponse
    {
        $data = $request->validated();

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

    public function update(UpdateIdeaRequest $request,Idea $idea): RedirectResponse
    {
        $this->authorize('update', $idea);
        $data = $request->validated();

        $idea->update($data);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea was updated successfully');
    }

    public function destroy(Idea $idea): RedirectResponse
    {
//        $this->authorize('idea.delete', $idea); // gate
        $this->authorize('delete', $idea);
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
