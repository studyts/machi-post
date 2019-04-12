@extends('layouts.app')

@section('content')
            <section class="bgTop mb-4">
                <div class="topMain">
                    <div class="topMainBody">
                        <h1 class="site-title">MACHI-POST</h1>
                        <p>都市の移り変わりを楽しむ共有サイト</p>
                        @if (Auth::check())
	                        <a href="/users/{{$user->id}}" class="btn my-1">投稿はこちらから</a>
                        @else
	                        <a href="/login" class="btn my-1">投稿はこちらから</a>
                        @endif
                    </div>
                </div>
            </section>
        
        <div class="container">
            <div class="row">
                @if (count($posts) > 0)
                    @include('posts.posts', ['posts' => $posts])
                @endif
            </div>
        </div>
 
@endsection