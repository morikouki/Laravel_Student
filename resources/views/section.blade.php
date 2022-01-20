<!-- まず最初に用意すべきもの、これで、「layouts」フォルダ内の「parent.blade.php」と言うレイアウトファイルをロードし、親レイアウトとして継承する。
これがないと機能しない。 -->
@extends('layouts.parent')

<!-- 単純にテキストや数字をセクションに表示させるだけなら以下のように第２引数に表示するテキストを指定する。endsection入らない。 -->
@section('title', 'Index')

<!-- ここは「menubar」と言う名前のセクション。-->
@section('menubar')

<!-- @parentというディレクティブは親レイアウトのセクションを示す。親のセクションに子のセクションを指定する場合、
親のsection部分を子のセクションが上書きする。このとき親のセクションを残して表示したい時がある。このような時に
@parentで親のセクションを表示できる。 -->
@parent
インデックスページ
@endsection

@section('content')
<p>ここが本文のコンテンツ</p>
<p>必要なだけ記述できる</p>
<p>Controller value<br>'message' = {{$message}}</p>
<p>ViewComposer value<br>'view_message' = {{$view_message}}</p>
@endsection

@section('footer')
copyright
@endsection