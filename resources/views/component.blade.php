<!DOCTYPE html>
<html lang="ja">

<head>
    <title>PHP Laravel入門</title>
</head>

<body>


    @component('layouts.componentParent')
    @slot('message_title')
    メッセージのタイトル
    @endslot

    @slot('message')
    メッセージの本文
    @endslot
    @endcomponent

</body>


</html>