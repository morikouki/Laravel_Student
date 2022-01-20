<!DOCTYPE html>
<html lang="ja">

<head>
    <title>PHP Laravel入門</title>
</head>

<body>
    <h1>Hello</h1>

    <p>USER:: {{$user->name.'('.$user->email.')'}}</p>

    <p>
        ※ ログインしていません。<a href="/login">ログイン</a>|<a href="/register">登録</a>
    </p>

</body>

</html>