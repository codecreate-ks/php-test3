<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //パスがecshop/registerのときのみバリデーション。それ以外は不許可。
        if ( $this->path() == 'ecshop/register'){
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
            'email' => 'required|email',
            'email_verified_at' => 'same:email',
            'password' => 'required|alpha-dash|alpha-num|min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'お名前は必ず入力してください。',
            'email.required' => 'メールアドレスは必ず入力してください。',
            'email.email' => 'メールアドレスを正しく入力してください。',
            'email_verified_at' => '上記メールアドレスと一致しません。',
            'password.required' => 'パスワードは必ず入力してください。',
            'password.alpha-dash|alpha-num' => 'パスワードで使える文字は半角英数字とハイフン（-）、アンダースコア（_）です。',
            'password.min:8' => 'パスワードは8文字以上で設定してください。',
        ];
    }
}