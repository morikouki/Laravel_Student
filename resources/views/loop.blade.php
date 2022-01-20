<!DOCTYPE html>
<html lang="ja">

<head>
    <title>PHP Laravel入門</title>
</head>

<body>

</body>
<h1>ループ処理を表示するページ</h1>

<div>
    @foreach ($data as $item)
    <p>現在のインデックス：{{$loop->index}}「$loop->index」</p>
    @endforeach
</div>

<div>
    @foreach ($data as $item)
    <p>現在の繰り返し数：{{$loop->iteration}}「$loop->iteration」</p>
    @endforeach
</div>

<div>
    @foreach ($data as $item)
    <p>あと何回繰り返すか：{{$loop->remaining}}「$loop->remaining」</p>
    @endforeach
</div>

<div>
    @foreach ($data as $item)
    <p>繰り返しで使っている配列の要素数：{{$loop->count}}「$loop->count」</p>
    @endforeach
</div>

<div>
    @foreach ($data as $item)
    <p>最初の繰り返しかどうか：{{$loop->first}}「$loop->first」</p>
    @endforeach
</div>

<div>
    @foreach ($data as $item)
    <p>最後の繰り返しかどうか：{{$loop->last}}「$loop->last」</p>
    @endforeach
</div>

<div>
    @foreach ($data as $item)
    <p>繰り返しのネスト数：{{$loop->depth}}「$loop->depth」</p>
    @endforeach
</div>

@php
$counter = 0;
@endphp

@while ($counter < count($data)) <p>{{$data[$counter]}}</p>
    @php
    $counter++;
    @endphp
    @endwhile


</html>