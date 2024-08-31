<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.edit', compact('user', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
                'name'  => 'string',
                'image' => 'nullable|image',
                'bio'   => 'nullable|string',
        ]);

        if(request('image')){
            $imagePath = $request->file('image')->store('profile', 'public');
            $data['image'] = $imagePath;

            Storage::disk()->delete($user->image ?? '');
        }

        $user->update($data);

        return redirect()->back();
    }


    public function follow(User $user): RedirectResponse
    {
        $follower = auth()->user();
        $follower->followings()->attach($user);

        return redirect()->back();
    }

    public function unfollow(User $user): RedirectResponse
    {
        $follower = auth()->user();
        $follower->followings()->detach($user);

        return redirect()->back();
    }
}
