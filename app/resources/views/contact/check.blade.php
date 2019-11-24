<html>
<head>
    <title>Contact/check</title>
<body>
    <h1>お問い合わせ内容を確認</h1>
    <p>●お名前：{{$name}}</p>
    <p>●メールアドレス：{{$email}}</p>
    <p>●お問い合わせ内容</p>
    <p>{!! nl2br(e($inquiry)) !!}</p>
</body>
</html>