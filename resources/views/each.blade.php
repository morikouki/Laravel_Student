<!DOCTYPE html>
<html lang="ja">

<head>
    <title>PHP Laravel入門</title>
</head>

<body>

    <div style="margin: 50px">
        <h2>ここには「layouts.each」ページの内容を「each」で繰り返し表示している</h2>
        <ul>
            @each('layouts.each', $data, 'item')
        </ul>
    </div>

</body>


</html>