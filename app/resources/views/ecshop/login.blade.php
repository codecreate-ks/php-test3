@extends('layouts.ecshopapp')

@section('title','ログイン')

@section('content')
    <p class="error">{{ $message }}</p>
    <form action="/ecshop/login" method="post">
        {{ csrf_field() }}
        <p>メールアドレス</p>
        <input type="text" name="email">
        <p>パスワード</p>
        <input type="password" name="password">
        <p>
            <input type="submit" value="ログイン">
        </p>
    </form>
@endsection