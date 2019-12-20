@extends('layouts.ecshopapp')

@section('title','カートの中身')

@section('content')
    @if (Auth::check())
    <p>こんにちは。{{Auth::user()->name}}さん。</p>
    <p><a href="/ecshop/logout">ログアウトする</a></p>
    @endif
    <a href="/ecshop">商品一覧に戻る</a>

    @foreach ($session_data['items'] as $session_item)
    <div class="goods">
        <img class="goods_img" src="/img/{{$session_item->image}}" alt="{{$session_item->item_name}}の写真">
        <p>{{$session_item->item_name}}</p>
        <p>{{$session_item->price}}円</p>
    </div>
    @endforeach
    {{-- {{ $items->links() }} --}}
    <p>合計金額：{{$session_data['sum']}}</p>
    <a href="/ecshop/purchaseComplete">購入する</a>
@endsection