@extends('layouts.helloapp')
@section('title','Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
<html>
<head></head>
<body>
<h1>テスト</h1>
<img src="{{ asset('/img/camera.jpg') }}" alt="">
</body>
</html>
@endsection

@section('footer')
copyright 2020 xxx.
@endsection