@extends('layouts.ecshopapp')

@section('title','カートのご利用について')

@section('content')
    <p>
        カートのご利用と商品のご購入は、ログイン後に会員登録後に可能となります。<br>
        会員登録をされていないお客様は、まず会員登録をお願いいたします。
    </p>
    <p><a href="/ecshop/register">会員登録</a></p>
    <p><a href="/ecshop/login">ログイン</a></p>
    <a href="/ecshop">商品一覧に戻る</a>
@endsection