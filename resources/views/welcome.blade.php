@extends('layouts.app')

@section('content')
            <section class="bgTop mb-4">
                <div class="topMain">
                    <div class="topMainBody">
                        <h1 class="site-title">MACHI-POST</h1>
                        <p>ああああああの共有サイト</p>
                        <a href="/login" class="btn my-1">ログインはこちら</a>
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