<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/follow_styles.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body class="text">
    <div class="container">
        <header class="header">
        <a href="/masters"><div class="headerContent h_home">Home</div></a> 
        <a href="/follower"><div class="headerContent h_whoToFollow">Who to follow</div></a> 
        <a href="/logout"><div class="headerContent h_logOut">Log out</div></a> 
        </header>
        <div class="section width">
            <div class="home">Who to follow</div>
            <div>
                @foreach($users as $user) 
                    @if (Auth::id() != $user->id)
                        <div class="box">
                            <div class="flexbox">
                                <div class="color name">{{ $user->name }}</div>
                                @if (Auth::id() != $user->id)
                                    @if (Auth::user()->is_following($user->id))
                                    <div>
                                        <form action="{{ route('unfollow', ['follower' => $user->id]) }}" method="delete">
                                            {{ csrf_field() }}
                                            <button class="following" tupe="submit">
                                                <span class="nomal">following</span>
                                                <span class="hover">unfollow</span>
                                            </button>
                                        </form>
                                    </div>
                            </div>
                                    @else
                                <div>
                                    <form action="{{ route('follow', ['follower' => $user->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        <button class="follow" tupe="submit">     
                                            <span class="f_nomal">follow</span>
                                            <span class="f_hover">follow</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                                @endif
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <footer class="footer"></footer>
    </div>
<script type="text/javascript" src="js/follower.js"></script>
</body>
</html>