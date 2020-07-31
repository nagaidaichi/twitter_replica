<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body class="backGround text">
<div class="container">
    <header class="header">
        <a href="/masters"><div class="headerContent h_home"><img class="img" src="css/img/home.svg"><span class="headerText">Home</span></div></a> 
        <a href="/follower"><div class="headerContent h_whoToFollow"><img class="img" src="css/img/human.svg"><span class="headerText">Who to follow</span></div></a> 
        <a href="/logout"><div class="headerContent h_logOut"><img class="img" src="css/img/logout.svg"><span class="headerText">Log out</span></div></a> 
    </header>
    <div class="section width">
        <div class="home">Home</div>
        <div class="pr">
            <form method="POST" action="/masters">
                {{ csrf_field() }}
                <textarea id="tweetContent" type="text" name="content" placeholder="What's happening?"></textarea>
                <button id="tweet" class="tweet" type="submit" onsubmit="return tweet(e)">Tweet</button>
            </form>
        </div>
        <div class="border"></div>
        <div class="timeline">
            @foreach($tweets as $tweet) 
                <div class="box">
                    <div class="name">{{ $tweet->user->name }}</div>
                    <div class="height">{{ $tweet->content }}</div>
                </div>
            @endforeach
            
        </div>
    </div>
    <footer class="footer"></footer>
</div>
<script type="text/javascript" src="js/master.js"></script>
</body>
</html>