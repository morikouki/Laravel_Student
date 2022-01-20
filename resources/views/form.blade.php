<!DOCTYPE html>
<html lang="ja">

<head>
    <title>PHP Laravel入門</title>
</head>

<body>

</body>
<h1>formを実装したページ</h1>

<!-- if文で送信された値が空の時に表示を変えるようにしている -->
@if ($msg != '')
<p>送信された値：{{$msg}}</p>
@else
<p>何も送信されてないです。</p>
@endif

<!-- isset（変数が定義済みの場合か）で表示を切り替えている -->
@isset ($msg)
<p>こんにちは、{{$msg}}さん。</p>
@else
<p>何か書いてください</p>
@endisset

<!-- POSTメソッドで指定してる。actionにはパスを指定。 -->
<form method="POST" action="/form/post">
    @csrf
    @error('name')
    {{$message}}
    @enderror
    <input type="text" name="msg">
    <input type="text" name="name">
    @error('age')
    {{$message}}
    @enderror
    <input type="number" name="age">
    <input type="submit">
</form>

<a href="/form">送信ページに戻る </a>

</html>