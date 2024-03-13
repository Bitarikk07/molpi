<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    ///Create new post
    public function send_idea()
    {
        ///Validation
        $request = request()->validate([
            'content' => 'required|min:2|max:240',
        ]);
        ///Validation user 
        $request['user_id'] = auth()->id();
        ///if he 'auth' he can create new post
        Idea::create($request);
        ///Redirect to home page
        return redirect('/')->with('message', 'Idea created Successfully');
    }
    ///Delete this post
    public function destroy(Idea $idea)
    {
        ///Validation 
        //if this user not autor this post he can't delete this post
        if (auth()->id() !== $idea->user_id) {
            ///and this function show him 404 page
            abort(404);
        }
        ///This validation for if idea not found in db , in page show error message
        elseif (!$idea) {
            return redirect('/')->with('error', 'Idea not found');
        }
        ///if he is autor this post , he can delete this post
        elseif (auth()->id() == $idea->user_id) {
            $idea->delete();
        }

        return redirect('/')->with('message', 'Idea Deleted');
    }
    ///Show this post in new page
    public function show(Idea $idea)
    {
        $view = true;
        return view('includes.show', compact('idea', 'view'));
    }
    ///Show editing form in page
    public function edit(Idea $idea)
    {
        ///Validation 
        //if this user not autor this post he can't delete this post
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        ///If editing true , in page show form area
        $editing = true;
        return view('includes.show', compact('idea', 'editing'));
    }
    ///Update content in this post
    public function update(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        $request = request()->validate([
            'content' => 'required|min:2|max:240',
        ]);
        ///update($request) for security , token not showing when user write dd()
        $idea->update($request);
        return redirect()->route('ideas.show', $idea->id)->with('message', 'Idea updated Successfully');
    }
}
