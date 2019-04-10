@extends('layouts.app')

@section('content')
<div class="container mt-5">
        <h1 class="standard">新規登録</h1>

    <div class="row">
        <div class="col-md-8 offset-md-2">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録する', ['class' => 'btn registration btn-block']) !!}
            {!! Form::close() !!}
            
            <p class="mt-2 attention">登録済みの方は<a href="/login">こちら</a>から。</p>
        </div>
    </div>
</div>
@endsection