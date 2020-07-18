<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <h2><span> : {{ Auth::user()->name }}がログイン中</span></h2>
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
            <span>{{ $tweet->user->name }}</span>
            @if (Auth::id() != $tweet->user->id)
                @if (Auth::user()->is_following($tweet->user->id))
                <span>: フォロー中</span>
                <form action="{{ route('unfollow', ['follower' => $tweet->user->id]) }}" method="delete">
                    {{ csrf_field() }}
                    <button tupe="submit">unfollow</button>
                </form>
                @else
                <form action="{{ route('follow', ['follower' => $tweet->user->id]) }}" method="post">
                    {{ csrf_field() }}
                    <button tupe="submit">follow</button>
                </form>
                @endif
            @endif
            <!-- <div>{{ date('Y/m/d', strtotime($tweet->created_at)) }}</div> -->
            <div>{{ $tweet->content }}</div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>