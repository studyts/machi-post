<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加
use App\Post; // 追加

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'posts' => $posts,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    // お気に入り追加
    public function likes($id)
    {
        $user = User::find($id);
        $likes = $user->likes()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $likes,
        ];

        $data += $this->counts($user);

        return view('users.likes', $data);
    }
}
