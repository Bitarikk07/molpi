<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{



    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    public function edit(User $user)
    {
        // dd($user->id);
        $this->authorize('update', $user);
        $editing = true;
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas', 'editing'));
    }
    public function update(User $user)
    {
        $this->authorize('update', $user);

        $request = request()->validate([
            'name' => 'required|min:2|max:40',
            'bio' => 'nullable|min:10|max:255',
            'image' => 'image'
        ]);

        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $request['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($request);
        if ($user->id === auth()->user()) {
            return redirect()->route('profile')->with('message', 'Profile Successfully updated');
        } elseif (auth()->user()->is_admin) {
            return redirect()->route('users.show', $user->id)->with('message', "Profile  userid:$user->id  Successfully  updated");
        } else {
            return redirect()->route('profile')->with('message', 'Profile Successfully updated');

        }
    }
    public function profile(User $user)
    {
        return $this->show(auth()->user());
    }
}
