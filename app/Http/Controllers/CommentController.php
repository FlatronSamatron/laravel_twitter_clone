<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Idea $idea)
    {
        $data = $request->validated();

        $data['idea_id'] = $idea->id;
        $data['user_id'] = auth()->id();

        Comment::create($data);

        return redirect()->back()->with('success', 'Comment was posted successfully');
    }
}
