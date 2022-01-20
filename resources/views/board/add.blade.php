@extends('layouts.parent')

@section('title', 'Board.add')

@section('menubar')
@parent
Board登録ページ
@endsection

@section('content')
<form action="/board/add" method="post">
    <table>
        @csrf
        @error('person_id')
        {{$message}}
        @enderror
        <tr>
            <th>person_id:</th>
            <td><input type="number" name="person_id" value="{{old('person_id')}}"></td>
        </tr>
        @error('title')
        {{$message}}
        @enderror
        <tr>
            <th>title:</th>
            <td><input type="text" name="title" value="{{old('title')}}"></td>
        </tr>
        @error('message')
        {{$message}}
        @enderror
        <tr>
            <th>message:</th>
            <td><input type="text" name="message" value="{{old('message')}}"></td>
        </tr>
        <tr>
            <td><input type="submit" value="send"></td>
        </tr>
    </table>
</form>
@endsection