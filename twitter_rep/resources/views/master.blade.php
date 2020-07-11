<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<ddivv class="container">
    <h2>home</h2>
    <div>
        <form method="POST" action="/masters">
            {{ csrf_field() }}
            <textarea name="content" placeholder="What's happening?"></textarea>
            <button type="submit">Tweet</button>
        </form>
    </div>
    <div>
        @foreach($tweets as $tweet) 
        <div>
            <div>{{ date('Y/m/d', strtotime($tweet->created_at)) }}</div>

            <div>{{$tweet->content}}</div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>