<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user) {
        $count_posts = $user->posts()->count();
        // お気に入り追加
        $count_likes = $user->likes()->count();
        
        return [
            'count_posts' => $count_posts,
            // お気に入り追加
            'count_likes' => $count_likes,
        ];
    }
}
