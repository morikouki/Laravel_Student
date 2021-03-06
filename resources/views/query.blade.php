<!DOCTYPE html>
<html lang="ja">

<head>
    <title>PHP Laravel入門</title>
</head>

<body>

</body>
<h1>これはクエリー文字列でコントローラーから値を渡しているページ</h1>
<p>
    クエリー文字列は、アドレスの後に「?◯◯=xx」といった形式でつけられたテキスト部分のこと。GoogleやAmazonなどのサイトにアクセスすると、<br />
    アドレスの後に延々と「◯◯=xx&△△=□□・・・」といった暗号のようなものが記述されていうるのを見たことあるでしょう？あれがクエリー文字列<br />
    クエリー文字列はルートパラメータとは少し受け取り方が違う。
</p>

<p>↓ここにコントローラーから渡した連想配列（data変数）内のmessage変数が表示される</p>
<h4>{{$message}}</h4>


<p>
    ↓ここに連想配列（data変数）の内「query/{パラメータ}」で渡したname変数が表示される。<br />
    クエリー文字列を「Request」のグローバル変数から受け取って渡している。
</p>
<h4>{{$name}}</h4>


</html>