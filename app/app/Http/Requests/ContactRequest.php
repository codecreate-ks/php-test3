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
        //パスがcontactのときのみバリデーション
        if ( $this->path() == 'contact/check'){
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
            'inquiry' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'お名前は必ず入力してください。',
            'email.required' => 'メールアドレスは必ず入力してください。',
            'email.email' => 'メールアドレスを正しく入力してください。',
            'inquiry.required' => 'お問い合わせ内容は必ず入力してください。',
        ];
    }
}
