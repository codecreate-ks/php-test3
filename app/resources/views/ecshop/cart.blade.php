@extends('layouts.ecshopapp')

@section('title','カートの中身')

@section('content')
    @if (Auth::check())
    <p>こんにちは。{{Auth::user()->name}}さん。</p>
    <p><a href="/ecshop/logout">ログアウトする</a></p>
    @endif
    <a href="/ecshop">商品一覧に戻る</a>

    @foreach ($items as $item)
    <div class="goods">
        <img class="goods_img" src="/img/{{$item->image}}" alt="{{$item->item_name}}の写真">
        <p>{{$item->item_name}}</p>
        <p>{{$item->price}}円</p>
    </div>
    @endforeach
    {{-- {{ $items->links() }} --}}
    <a href="">購入する</a>
@endsection