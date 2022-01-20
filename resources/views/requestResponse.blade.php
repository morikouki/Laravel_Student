<!DOCTYPE html>
<html lang="ja">

<head>
    <title>PHP Laravel入門</title>
</head>

<body>

</body>
<h1>リクエストとレスポンスを確認するページ</h1>

<p>
    下記にRequestのオブジェクトの値が表示される
</p>
<h4>{{$request}}</h4>

<p>
    下記にResponseのオブジェクトの値が表示される
</p>
<h4>{{$response}}</h4>


<p>下記にRequestのurl()メソッドで取得したアドレスが表示される</p>
<h4>{{$url}}</h4>

<p>下記にRequestのpath()メソッドで取得したパスが表示される</p>
<h4>{{$path}}</h4>

<p>下記にResponseのstatus()メソッドで取得したステータスコードが表示される</p>
<h4>{{$status}}</h4>



詳しくは web.phpファイルのルーティングと「RequestResponseController.php」を見よう。

</html>