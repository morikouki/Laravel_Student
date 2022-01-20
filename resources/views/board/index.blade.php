@extends('layouts.parent')

@section('title', 'Board.index')

@section('menubar')
@parent
ボード・インデックスページ
@endsection

@section('content')
<table>
    <tr>
        <th>DATA</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{$item->getData()}}</td>
    </tr>
    @endforeach
</table>
@endsection