<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

use function PHPUnit\TestFixture\func;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $followingsIds = auth()->user()->followings()->pluck('id');

        $ideas = Idea::whereIn('user_id', $followingsIds)->latest();

        if($request->has('search')){
            $ideas = $ideas->search($request->get('search', ''));
        }

        $ideas = $ideas->paginate(5);

        return view('dashboard', compact('ideas'));
    }
}
