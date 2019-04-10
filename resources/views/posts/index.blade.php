@extends('layouts.app')

@section('content')
    @foreach ($posts as $post)
    <div class="col-sm-4 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div>
                    <p><img src="{!! asset('storage/images/'.$post->picture) !!}" width="100%"></p>
                    <p class="mb-0">{!! nl2br(e($post->content)) !!}</p>
                </div>
                <div>
                    {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!} <span class="text-muted">posted at {{ $post->created_at }}</span>
                </div>
                <div class="row justify-content-center">
                    <div>
                       
                            @include('user_likes.like_button', ['user' => $user])

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
{{ $posts->render('pagination::bootstrap-4') }}
@endsection