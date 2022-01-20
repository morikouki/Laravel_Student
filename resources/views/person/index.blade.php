@extends('layouts.parent')

@section('title', 'Person.index')

@section('menubar')
@parent
インデックスページ
@endsection

@section('content')
<table>
    <tr>
        <th>DATA</th>
    </tr>
    @foreach($hasItems as $item)
    <tr>
        <td>{{$item->getData()}}</td>
        <td>
            @if ($item->board != null)
            <table width="100%">
                @foreach ($item->boards as $board)
                <tr>
                    <td>{{$board->getData()}}</td>
                </tr>
                @endforeach
            </table>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection
<div style="margin: 20px">
    <table>
        <tr>
            <th>Person</th>
        </tr>
        @foreach ($noItems as $item)
        <tr>
            <td>{{$item->getData()}}</td>
        </tr>
        @endforeach
    </table>
</div>