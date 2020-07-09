<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>home</h2>
        <div>
            <div><img src=""></div>
            <div>
                <form method="post" action="{{ url('/user') }}">
                    {{ csrf_field() }}
                    <div>
                        <textarea name="content" placeholder="What's happening?"></textarea>
                    </div>
                    <div>
                        <button type="submit">Tweet</button>
                    </div>
                </form>
            </div>
            <ul>
                <!-- ここにタイムライン表示 -->
            </ul>
        </div>
    </div>
</body>
</html>