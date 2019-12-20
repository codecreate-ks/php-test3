<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Model\EcShop;
use App\Model\Cart;
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

    public function logout(Request $request)
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
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])){
            return view('ecshop.registerDone');
        } else {
            $msg = 'ログインに失敗しました。';
            return view('ecshop.login', ['message' => $msg]);
        }
    }

    public function cartShow(Request $request)
    {
        if (Auth::check()){
            $sesdata = $request->session()->get('param');
            if(isset($sesdata)){
                return view('ecshop.cart', ['session_data' => $sesdata]);
            } else {
                return view('ecshop.cartEmpty');
            }
        } else {
            return redirect('/ecshop');
        }
    }

    public function cartAdd(Request $request)
    {
        $user_id = Auth::id();
        Cart::create([
            'user_id'=>$user_id,
            'item_id'=>$request->item_id,
            'item_name'=>$request->item_name,
            'price'=>$request->price,
            'image'=>$request->image
        ]);
        // $items = Cart::where('user_id', $user_id)->get()->paginate(4);
        $items = Cart::where('user_id', $user_id)->get();
        $sum = Cart::where('user_id', $user_id)->sum('price');
        $param = [
            'items' => $items,
            'sum' => $sum,
        ];
        $request->session()->put('param', $param);
        return redirect('/ecshop/cart');
    }

    public function purchaseComplete(Request $request)
    {
        $user_id = Auth::id();
        DB::table('cart')->where('user_id', $user_id)->delete();
        $request->session()->forget('param');
        return view('ecshop. purchaseComplete');
    }
}