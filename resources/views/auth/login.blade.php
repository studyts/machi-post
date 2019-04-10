@extends('layouts.app')

@section('content')
<div class="container mt-5">
        <h1 class="standard">ユーザーログイン</h1>

    <div class="row">
        <div class="col-md-8 offset-md-2">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログインする', ['class' => 'btn login btn-block']) !!}
            {!! Form::close() !!}

            <p class="mt-2 attention">新規ユーザー登録は<a href="/signup">こちら</a>から。</p>
        </div>
    </div>
</div>
@endsection