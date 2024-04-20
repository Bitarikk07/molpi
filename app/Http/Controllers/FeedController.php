<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $followingIds = $user->followings()->pluck('user_id');
        // dd($followingIds);

        $ideas = Idea::query()
            ->when(request()->has('search'), function ($query) {
                $query->where('content', 'like', '%' . request()->get('search') . '%');
            })
            ->whereIn('user_id', $followingIds);;
        $orderBy = Session::get('order_by', 'recent');

        if ($orderBy === 'recent') {
            $ideas->latest();
        } elseif ($orderBy === 'old') {
            $ideas->oldest();
        }

        $ideas = $ideas->paginate(3);

        return view('dashboard', compact('ideas', 'orderBy'));
    }
}
