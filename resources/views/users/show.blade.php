@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="card-title">マイページ</h2>
                    <h3>新規投稿</h3>
                    @if (Auth::id() == $user->id)
                    {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
                        <div class="form-group">
                            画像ファイルを選択{!! Form::file('picture') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2', 'placeholder' => 'コメントを投稿してください']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('投稿する', ['class' => 'btn btn-secondary btn-block']) !!}
                        </div>
                    {!! Form::close() !!}
            </div>
        </div>
            @endif
        <div class="row">
            @if (count($posts) > 0)
                @include('posts.posts', ['posts' => $posts])
            @endif
        </div>
    </div>
    
@endsection