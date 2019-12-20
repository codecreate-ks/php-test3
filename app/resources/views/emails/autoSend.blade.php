<?php var_dump($session_data) ?>

ご購入ありがとうございます。
今回のご注文内容は以下の通りです。

{{-- ●ご注文商品・価格
@foreach ($session_data['items'] as $session_item)
echo {{$session_item->item_name}};
echo {{$session_item->price}}円;
@endforeach

●合計金額
合計金額：{{$session_data['sum']}}円 --}}

またのご利用をお待ちしております。