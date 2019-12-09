<?php var_dump($data) ?><!--確認用-->

<html>
<head>
    <title>Contact/Check</title>
<body>
    <h1>お問い合わせ内容を確認</h1>
    <p>お問い合わせ内容を確認してください。</p>
    <p>●お名前：{{$data['name']}}</p>
    <p>●メールアドレス：{{$data['email']}}</p>
    <p>●お問い合わせ内容</p>
    <p>{!! nl2br(e($data['inquiry'])) !!}</p>
    <form method="POST" action="/contact/finish">
        {{ csrf_field() }}
        <input type="hidden" name="name" value="{{$data['name']}}">
        <input type="hidden" name="email" Value="{{$data['email']}}">
        <input type="hidden" name="inquiry" Value="{{$data['inquiry']}}">
        <input type="submit" value="送信する">
    </form>
    <form method="POST" action="/contact">
        {{ csrf_field() }}
        <input type="hidden" name="name" value="{{$data['name']}}">
        <input type="hidden" name="email" Value="{{$data['email']}}">
        <input type="hidden" name="inquiry" Value="{{$data['inquiry']}}">
        <input type="submit" value="戻る">
    </form>
</body>
</html>