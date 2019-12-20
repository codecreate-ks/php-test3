@extends('layouts.ecshopapp')

@section('title','商品一覧')

@section('content')
    @if (Auth::check())
    <div class="logined">
        <p>こんにちは。{{Auth::user()->name}}さん。</p>
        <p><a href="/ecshop/logout">ログアウトする</a></p>
    </div>
    @endif
    @foreach ($items as $item)
    <div class="goods">
        <img class="goods_img" src="/img/{{$item->image}}" alt="{{$item->item_name}}の写真">
        <p>{{$item->item_name}}</p>
        <p>{{$item->price}}円</p>
        <p>
            <form action="/ecshop/cart" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="item_id" value="{{$item->item_id}}">
                <input type="hidden" name="item_name" value="{{$item->item_name}}">
                <input type="hidden" name="price" value="{{$item->price}}">
                <input type="hidden" name="image" value="{{$item->image}}">
                <input type="submit" value="カートに追加する">
            </form>
        </p>
    </div>
    @endforeach
    {{ $items->links() }}
    @if (!Auth::check())
        <p><a href="/ecshop/register">会員登録</a></p>
        <p><a href="/ecshop/login">ログイン</a></p>
    @endif
@endsection