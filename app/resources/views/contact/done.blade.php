<?php var_dump($items) ?><!--確認用-->

<html>
<head>
    <title>Contact/Finish</title>
<body>
    <h1>受付完了画面</h1>
    <p>下記の内容でお問い合わせを受け付けました。</p>
    <p>●お名前：{{$items->name}}</p>
    <p>●メールアドレス：{{$items->email}}</p>
    <p>●お問い合わせ内容</p>
    <p>{!! nl2br(e($items->inquiry)) !!}</p>
    <a href="/contact">入力画面に戻る</a>
</body>
</html>