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
use Illuminate\Support\Facades\Mail;//メール送信に使用
use App\Mail\autoSendMail;//メール送信に使用

class EcShopController extends Controller
{
    //商品一覧ページ
    public function index(Request $request)
    {
        $items = EcShop::paginate(4);
        return view('ecshop.index', ['items' => $items]);
    }

    //ログイン画面
    public function getLogin(Request $request)
    {
        $msg = '';//ログイン画面の初期状態ではメッセージ無し
        return view('ecshop.login', ['message' => $msg]);
    }

    //ログイン処理
    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        //ログイン認証
        if (Auth::attempt(['email' => $email, 'password' => $password])){
            //カート情報の取得とセッションの使用
            $user_id = Auth::id();
            $items = Cart::where('user_id', $user_id)->get();
            $sum = Cart::where('user_id', $user_id)->sum('price');
            $param = [
                'items' => $items,
                'sum' => $sum,
            ];
            $request->session()->put('param', $param);
            return redirect('/ecshop');
        } else {
            $msg = 'ログインに失敗しました。';
            return view('ecshop.login', ['message' => $msg]);
        }
    }

    //ログアウト処理
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/ecshop');
    }

    //会員登録画面
    public function getRegister(Request $request)
    {
        return view('ecshop.register');
    }

    //会員登録処理
    public function postRegisterDone(EcShopRequest $request)
    {
        //新規ユーザーのデータベースへの登録
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'email_verified_at'=>$request->email_verified_at,
            'password' => Hash::make($request->password),
        ]);
        //フォームから送られたデータを元に会員登録後ログイン状態にする
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])){
            return view('ecshop.registerDone');
        } else {
            //何かの影響でログインできなかった時の処理
            $msg = 'ログインに失敗しました。';
            return view('ecshop.login', ['message' => $msg]);
        }
    }

    //カートの中を表示
    public function cartShow(Request $request)
    {
        $session_data = $request->session()->get('param');
        //カート内の商品の有無をチェック
        if($session_data['sum'] != 0){
            return view('ecshop.cart', ['session_data' => $session_data]);
        } else {
            return view('ecshop.cartEmpty');
        }
    }

    //カートに追加
    public function cartAdd(Request $request)
    {
        //ログイン中のみカートへ追加可能
        if (Auth::check()){
            $user_id = Auth::id();
            Cart::create([
                'user_id'=>$user_id,
                'item_id'=>$request->item_id,
                'item_name'=>$request->item_name,
                'price'=>$request->price,
                'image'=>$request->image
            ]);
            //カート情報の取得とセッションの使用
            $items = Cart::where('user_id', $user_id)->get();
            $sum = Cart::where('user_id', $user_id)->sum('price');
            $param = [
                'items' => $items,
                'sum' => $sum,
            ];
            $request->session()->put('param', $param);
            return redirect('/ecshop/cart');
        } else {
            //ログインしていない状態で「カートに追加する」ボタンを押された時の対応
            return view('ecshop.cartNoAuth');
        }
    }

    //購入、メール送信
    public function purchaseComplete(Request $request)
    {
        //カート情報の取得
        $session_data = $request->session()->get('param');
        //ログインユーザー情報の取得
        $user = Auth::user();
        //メールの送信
        $name = $user->name;
        $text = 'ありがとうございます。';
        $to = $user->email;
        // Mail::to($to)->send(new autoSendMail($name, $text, $session_data));//メール送信は実際のサーバーで
        //ログインユーザーの商品情報をcartテーブルから消去、セッションも消去
        $user_id = Auth::id();
        DB::table('cart')->where('user_id', $user_id)->delete();
        $request->session()->forget('param');
        return view('ecshop.purchaseComplete');
    }
}