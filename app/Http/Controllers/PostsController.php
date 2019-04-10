<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        $user = \Auth::user();
        if (\Auth::check()) {
            //$user = \Auth::user();
            //$posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
            $posts = Post::orderBy('id','desc')->paginate(25);
        /*    
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        */
        } else {
            $posts = Post::orderBy('id','desc')->paginate(25);
            
        }
        
        $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'picture' => 'required|file|image|max:100000',
        ]);

        
	    $filename = $request->file('picture')->getClientOriginalName();
        $request->user()->posts()->create([
            'content' => $request->content,
            'picture' => $request->file('picture')->storeAs('public/images', $filename),
            'picture' => $filename
        ]);
        
        
        return back();
    }
    
    public function destroy($id)
    {
        $post = \App\Post::find($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        return back();
    }
}
