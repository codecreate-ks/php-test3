
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
        <p>{{$data['name']}}</p>
        @if ($errors->has('name'))
        <p class="error">{{$errors->first('name')}}</p>
        @endif
        <input type="text" name="name" value="{{old('name')}}">

        @if ($errors->has('email'))
        <p class="error">{{$errors->first('email')}}</p>
        @endif
        <p>{{$data['email']}}</p>
        <input type="text" name="email" value="{{old('email')}}">

        @if ($errors->has('inquiry'))
        <p class="error">{{$errors->first('inquiry')}}</p>
        @endif
        <p>{{$data['inquiry']}}</p>
        <p>
            <textarea name="inquiry" id="" cols="30" rows="10">{{old('inquiry')}}</textarea>
        </p>
        <input type="submit">
    </form>
</body>
</html>