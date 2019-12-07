@extends('layouts.helloapp')

@section('title','Show')

@section('menubar')
    @parent
    削除ページ
@endsection

@section('content')
    <?php var_dump($item) ?>
    <table>
        <tr><th>id:</th><td>{{$item->id}}</td></tr>
        <tr><th>name:</th><td>{{$item->name}}</td></tr>
        <tr><th>mail:</th><td>{{$item->mail}}</td></tr>
        <tr><th>age:</th><td>{{$item->age}}</td></tr>
    </table>
@endsection

@section('footer')
copyright 2020 xxx.
@endsection