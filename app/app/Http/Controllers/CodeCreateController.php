<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CodeCreateController extends Controller
{
    public function check(){
        $data = [
            'name'=>'お名前',
            'email'=>'メールアドレス',
            'inquiry'=>'お問い合わせ内容'
        ];
        return view('contact.contact', $data);
    }

    public function post(Request $request){
        $name = $request->name;
        $email = $request->email;
        $inquiry = $request->inquiry;
        $data = [
            'name'=>$name,
            'email'=>$email,
            'inquiry'=>$inquiry
        ];
        return view('contact.check', $data);
    }
}