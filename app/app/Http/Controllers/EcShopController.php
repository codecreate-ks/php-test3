<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Model\EcShop;
use App\Http\Requests\EcShopRequest;//フォームリクエストの使用

class EcShopController extends Controller
{

    public function index(Request $request)
    {
        $items = EcShop::paginate(4);
        return view('ecshop.index', ['items' => $items]);
    }

    public function getLogin(Request $request)
    {
        $msg = '';
        return view('ecshop.login', ['message' => $msg]);
    }

    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('/ecshop');
        } else {
            $msg = 'ログインに失敗しました。';
            return view('ecshop.login', ['message' => $msg]);
        }
    }

    public function Logout(Request $request)
    {
        if (Auth::check()){
            Auth::logout();
            return redirect('/ecshop');
        } else {
            return redirect('/ecshop');
        }
    }

    public function getRegister(Request $request)
    {
        return view('ecshop.register');
    }

    public function postRegisterDone(EcShopRequest $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'email_verified_at'=>$request->email_verified_at,
            'password' => Hash::make($request->password),
        ]);
        return view('ecshop.registerDone');
    }
}