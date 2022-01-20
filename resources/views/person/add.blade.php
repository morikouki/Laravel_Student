@extends('layouts.parent')

@section('title', 'Person.add')

@section('menubar')
@parent
Person登録ページ
@endsection

@section('content')
<form action="/person/add" method="post">
    <table>
        @csrf
        @error('name')
        {{$message}}
        @enderror
        <tr>
            <th>name:</th>
            <td><input type="text" name="name" value="{{old('name')}}"></td>
        </tr>
        @error('mail')
        {{$message}}
        @enderror
        <tr>
            <th>mail:</th>
            <td><input type="text" name="mail" value="{{old('mail')}}"></td>
        </tr>
        @error('age')
        {{$message}}
        @enderror
        <tr>
            <th>age:</th>
            <td><input type="text" name="age" value="{{old('age')}}"></td>
        </tr>
        <tr>
            <td><input type="submit" value="send"></td>
        </tr>
    </table>
</form>
@endsection