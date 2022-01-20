<!DOCTYPE html>
<html lang="ja">

<head>
    <title>PHP Laravel入門</title>
</head>

<body>

</body>
<h1>コントローラーを経由して任意パラメーターを表示するページ</h1>

<p>
    ↓ここに「paraCon/{パラメータ}」で渡した引数が表示される。<br />
    引数を渡していないときはデフォルト値の「何も渡ってない」が表示される。
</p>
<h4>{{$msg}}</h4>

<p>
    以下にはもう一つのパラメータ「paraCon/{}/{パラメータ}」が表示される。
    何も渡していない場合は、「3」が表示される。
</p>
<h4>{{$num}}</h4>



詳しくは web.phpファイルのルーティングと「ParaController.php」を見よう。

</html>