<?php var_dump($data) ?><!--確認用-->

<html>
<head>
    <title>Contact/Finish</title>
<body>
    <h1>お問い合わせ内容を表示</h1>
    <p>●お名前：{{$data['name']}}</p>
    <p>●メールアドレス：{{$data['email']}}</p>
    <p>●お問い合わせ内容</p>
    <p>{!! nl2br(e($data['inquiry'])) !!}</p>
</body>
</html>