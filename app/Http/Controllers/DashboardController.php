<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $ideas = Idea::orderBy('created_at', 'desc');

        if($request->has('search')){
            $search = $request->get('search', '');
            $ideas = $ideas->where('content', 'like', "%$search%");
        }

        $ideas = $ideas->paginate(5);

        return view('dashboard', compact('ideas'));
    }
}
