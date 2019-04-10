@if (Auth::check())
    @if (Auth::user()->is_like($post->id))
        {!! Form::open(['route' => ['likes.unlike', $post->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="far fa-thumbs-up"></i>', ['class' => "btn btn-danger type01", 'type' => 'submit']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['likes.like', $post->id]]) !!}
            {!! Form::button('<i class="fas fa-thumbs-up"></i>', ['class' => "btn btn-primary type01", 'type' => 'submit']) !!}
        {!! Form::close() !!}
    @endif
@endif