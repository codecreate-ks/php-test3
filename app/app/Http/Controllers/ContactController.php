<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Contact;//モデルの操作
use App\Http\Requests\ContactRequest;//フォームリクエストの使用

class ContactController extends Controller
{
    public function backToIndex(){
        return redirect('/contact');
    }

    public function index(){
        $data = [
            'name' => 'お名前',
            'email' => 'メールアドレス',
            'inquiry' => 'お問い合わせ内容'
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
        $contact = new Contact;
        $form = $request->all();
        unset($form['_token']);
        $contact->timestamps = false;//エラー回避のため
        $contact->fill($form)->save();
        $items = Contact::all()->last();
        return view('contact.done', ['items' => $items]);
    }
}