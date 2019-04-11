<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>MACHI-POST</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    </head>

    <body>

        @include('commons.navbar')
        
        
            @include('commons.error_messages')
            
            @yield('content')
        
        <footer class="footer">
        @if (Auth::check())
	        <div class="footernav"><a href="/">TOP</a>｜{!! link_to_route('users.show', 'マイページ', ['id' => Auth::id()]) !!}｜{!! link_to_route('users.likes', 'お気に入り投稿', ['id' => Auth::id()]) !!}｜{!! link_to_route('logout.get', 'ログアウト') !!}</div>
        @else
	        <div class="footernav"><a href="/">TOP</a>｜<a href="/signup">新規登録</a>｜<a href="/login">ログイン</a></div>
        @endif
            <div class="coryright">&copy; MACHI-POST</div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>