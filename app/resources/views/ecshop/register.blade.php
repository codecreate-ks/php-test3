@extends('layouts.ecshopapp')

@section('title','会員登録')

@section('content')
    <form action="/ecshop/register-finish" method="post">
        {{ csrf_field() }}
        <p>お名前（必須）</p>
        @if ($errors->has('name'))
        <p class="error">{{$errors->first('name')}}</p>
        @endif
        <input type="text" name="name" value="{{old('name')}}">

        <p>メールアドレス（必須）</p>
        @if ($errors->has('email'))
        <p class="error">{{$errors->first('email')}}</p>
        @endif
        <input type="text" name="email" value="{{old('email')}}">

        <p>メールアドレス確認（必須）</p>
        @if ($errors->has('email_verified_at'))
        <p class="error">{{$errors->first('email_verified_at')}}</p>
        @endif
        <input type="text" name="email_verified_at" value="{{old('email_verified_at')}}">

        <p>パスワード（必須）</p>
        <p>8文字以上の半角英数字で設定してください。</p>
        @if ($errors->has('password'))
        <p class="error">{{$errors->first('password')}}</p>
        @endif
        <input type="password" name="password">
        <p>
            <input type="submit" value="利用規約に同意して登録">
        </p>
    </form>
@endsection