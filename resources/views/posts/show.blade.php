@extends('layouts.app')

@section('content')


    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <h2 class="card-title">詳細ページ</h2>
            <div class="card shadow-sm">
            <div class="card-body">
                <div>
                    <p><img src="{!! asset('storage/images/'.$post->picture) !!}" width="100%"></p>
                    <p class="mb-0 postTitle">{!! nl2br(e($post->content)) !!}</p>
                </div>
                <div class="postInfo">
                    {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!} posted at {{ $post->created_at }}
                </div>
                <div class="row justify-content-center">
                    @include('user_likes.like_button', ['post' => $post])
                </div>
            </div>
            </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>

@endsection