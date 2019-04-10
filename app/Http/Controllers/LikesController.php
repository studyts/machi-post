<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    // お気に入り追加
    public function store(Request $request, $id)
    {
        \Auth::user()->like($id);
        return back();
    }

    public function destroy($id)
    {
        \Auth::user()->unlike($id);
        return back();
    }
}
