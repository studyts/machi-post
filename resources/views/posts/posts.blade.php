    
    <div class="card-columns">
        @foreach ($posts as $post)
        
        <div class="card shadow-sm">
            <div class="card-body">
                <div>
                    <p><a href="/posts/{{$post->id}}"><img src="{!! asset('storage/images/'.$post->picture) !!}" width="100%"></a></p>
                    <p class="mb-0 postTitle"><a href="/posts/{{$post->id}}">{!! nl2br(e($post->content)) !!}</a></p>
                </div>
                <div class="postInfo">
                    {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!} posted at {{ $post->created_at }}
                </div>
                <div class="row justify-content-center">
                    @include('user_likes.like_button', ['user' => $user])
                    @if (Auth::id() == $post->user_id)
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-danger type01', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
        
    
        @endforeach
    </div>

{{ $posts->render('pagination::bootstrap-4') }}