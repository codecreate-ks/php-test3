
<?php var_dump($data) ?><!--確認用-->

<html>
<head>
    <title>Contact/Index</title>
    <style>
        .error{
            color: #b22222;
            list-style-type: none;
        }
    </style>
</head>
<body>
    <h1>お問い合わせ内容を入力</h1>

    @if (count($errors) > 0)
        <p>入力に問題があります。再入力してください。</p>
    @else
        <p>フォームを入力してください。</p>
    @endif

    <form method="POST" action="/contact/check">
        {{ csrf_field() }}
        <p>お名前（必須）</p>
        @if ($errors->has('name'))
        <p class="error">{{$errors->first('name')}}</p>
        @endif
        <input type="text" name="name" value="{{$data['name']}}">

        <p>メールアドレス（必須）</p>
        @if ($errors->has('email'))
        <p class="error">{{$errors->first('email')}}</p>
        @endif
        <input type="text" name="email" value="{{$data['email']}}">

        <p>お問い合わせ内容（必須）</p>
        @if ($errors->has('inquiry'))
        <p class="error">{{$errors->first('inquiry')}}</p>
        @endif
        <p>
            <textarea name="inquiry" id="" cols="30" rows="10">{{$data['inquiry']}}</textarea>
        </p>
        <input type="submit" value="確認画面へ">
    </form>
</body>
</html>