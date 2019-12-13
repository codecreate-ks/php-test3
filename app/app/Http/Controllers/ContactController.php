<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Contact;//モデルの操作
use App\Http\Requests\ContactRequest;//フォームリクエストの使用

class ContactController extends Controller
{
    public function backToIndex(Request $request){
        return redirect('/contact');
    }

    public function index(){
        $data = [
            'name'=>old('name'),
            'email'=>old('email'),
            'inquiry'=>old('inquiry')
        ];
        return view('contact.contact', ['data' => $data]);
    }

    public function back(Request $request){
        $name = $request->name;
        $email = $request->email;
        $inquiry = $request->inquiry;
        $data = [
            'name'=>$name,
            'email'=>$email,
            'inquiry'=>$inquiry
        ];
        return view('contact.contact', ['data' => $data]);
    }

    public function check(ContactRequest $request){
        $name = $request->name;
        $email = $request->email;
        $inquiry = $request->inquiry;
        $data = [
            'name'=>$name,
            'email'=>$email,
            'inquiry'=>$inquiry
        ];
        return view('contact.check', ['data' => $data]);
    }

    public function done(Request $request){
        $items = Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'inquiry'=>$request->inquiry
        ]);
        return view('contact.done', ['items' => $items]);
    }

    //元のやつ
    // public function done(Request $request){
    //     $contact = new Contact;
    //     $form = $request->all();
    //     unset($form['_token']);
    //     $contact->timestamps = false;//エラー回避のため
    //     $contact->fill($form)->save();
    //     $items = Contact::all()->last();
    //     return view('contact.done', ['items' => $items]);
    // }
    //レビューコメント
    //①
    //last()がその要素の一番最後を取得という意味になるので、一見一番新しい今回のデータを取得できるかと思いますが、
    //万が一同タイミングでの問い合わせが行われた際には（もちろん可能性は低いのですが）最悪別の人の個人情報が表示されることになるので、
    //DBから取得して表示したいならID指定、簡単に済ますなら$requestでPOSTで受け取ってるやつをそのまま使うのが無難
    //②
    //fillメソッドはこれでもいいのですが、シンプルにcreateだけにしてもいいかもしれません。
    //createにするとsave()も不要になりますし $contact = new Contact; のインスタンスも不要になります。
    //同時にさっきの $items = Contact::all()->last();でのエラーの問題についても
    //$contactdata = Contact::create(~~~); の形で受け取ると
    //この$contactdataに今DBに挿入したデータが入ってるのでそのまま画面に表示したりできます！
    //参考 → https://qiita.com/katsunory/items/87a73297f44a65f1474f
}