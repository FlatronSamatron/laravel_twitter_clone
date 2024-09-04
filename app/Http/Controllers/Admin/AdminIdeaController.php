<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminIdeaController extends Controller
{
    public function index(): View
    {
        $ideas = Idea::latest()->paginate(10);
        return view('admin.ideas.index', compact('ideas'));
    }
}
