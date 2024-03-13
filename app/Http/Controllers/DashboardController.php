<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Idea;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        // return new WelcomeEmail(auth()->user());

        $ideas = Idea::query()
            // Загрузить связанные модели здесь
            ->when(request()->has('search'), function ($query) {
                $query->where('content', 'like', '%' . request()->get('search') . '%');
            });

        // if (request()->has('search')) {
        //     $ideas->where('content', 'like', '%' . request()->get('search') . '%');
        // }

        $orderBy = Session::get('order_by', 'recent');

        if ($orderBy === 'recent') {
            $ideas->latest();
        } elseif ($orderBy === 'old') {
            $ideas->oldest();
        }

        $ideas = $ideas->paginate(3);

        return view('dashboard', compact('ideas', 'orderBy'));
    }
    public function terms()
    {
        return view('terms');
    }


    public function setik($orderBy)
    {
        Session::put('order_by', $orderBy);
        return redirect()->back();
    }
}
