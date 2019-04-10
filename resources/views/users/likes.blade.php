@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>お気に入り投稿一覧</h2>
        <div class="row">
            @include('posts.posts', ['posts' => $users])
        </div>
    </div>
@endsection