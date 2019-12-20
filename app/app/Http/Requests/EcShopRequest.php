<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EcShopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //パスがecshop/registerからのpost送信のときのみリクエスト、バリデーション。それ以外は不許可。
        if ( $this->path() == 'ecshop/register-finish'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'email_verified_at' => 'same:email',
            'password' => 'required|min:8|regex:/^[0-9a-zA-Z]*$/',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'お名前は必ず入力してください。',
            'email.required' => 'メールアドレスは必ず入力してください。',
            'email.email' => 'メールアドレスを正しく入力してください。',
            'email.unique' => '別のメールアドレスを指定してください。',
            'email_verified_at.same' => '上記メールアドレスと一致しません。',
            'password.required' => 'パスワードは必ず入力してください。',
            'password.min' => 'パスワードは8文字以上で設定してください。',
            'password.regex' => 'パスワードで使える文字は半角英数字のみです。',
        ];
    }
}