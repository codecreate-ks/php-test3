<html>
<head>
    <title>Contact/contact</title>
</head>
<body>
    <h1>お問い合わせ内容を入力</h1>
    <form method="POST" action="/contact">
        {{ csrf_field() }}
        <p>{{$name}}</p>
        <input type="text" name="name">
        <p>{{$email}}</p>
        <input type="text" name="email">
        <p>{{$inquiry}}</p>
        <p>
            <textarea name="inquiry" id="" cols="30" rows="10"></textarea>
        </p>
        <input type="submit">
    </form>
</body>
</html>