@extends('layouts.ecshopapp')

@section('title','商品一覧')

@section('content')
    @if (Auth::check())
    <p>こんにちは。{{Auth::user()->name}}さん。</p>
    <p><a href="/ecshop/logout">ログアウトする</a></p>
    @endif
    @foreach ($items as $item)
    <div class="goods">
        <img class="goods_img" src="/img/{{$item->image}}" alt="{{$item->item_name}}の写真">
        <p>{{$item->item_name}}</p>
        <p>{{$item->price}}円</p>
    </div>
    @endforeach
    {{ $items->links() }}
    @if (!Auth::check())
    <p><a href="/ecshop/register">会員登録</a></p>
    <p><a href="/ecshop/login">ログイン</a></p>
    @endif
@endsection