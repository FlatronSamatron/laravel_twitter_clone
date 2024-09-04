<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {

        $ideas = Idea::when($request->has('search'), function ($query){
            $query->search(request()->get('search', ''));
        })->orderBy('created_at', 'desc')->paginate(5);
        

        return view('dashboard', compact('ideas'));
    }
}
