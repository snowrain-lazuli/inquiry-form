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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            //
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'gender' => ['required'],
            'first_tel' => ['required', 'numeric', 'digits_between:3,5'],
            'second_tel' => ['required', 'numeric', 'digits_between:3,5'],
            'three_tel' => ['required', 'numeric', 'digits_between:3,5'],
            'address' => ['required', 'string', 'max:255'],
            'categories' => ['required'],
            'detail' => ['required', 'string', 'max:120'],

        ];
    }
    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'last_name.string' => '姓を入力してください',
            'last_name.max' => '姓姓を入力してください',
            'first_name.required' => '名を入力してください',
            'first_name.string' => '名を入力してください',
            'first_name.max' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'email.max' => 'メールアドレスを入力してください',
            'first_tel.required' => '電話番号を入力してください',
            'first_tel.numeric' => '電話番号を入力してください',
            'first_tel.digits_between' => '`電話番号は5桁までの数字で入力してください`',
            'second_tel.required' => '電話番号を入力してください',
            'second_tel.numeric' => '電話番号を入力してください',
            'second_tel.digits_between' => '`電話番号は5桁までの数字で入力してください`',
            'three_tel.required' => '電話番号を入力してください',
            'three_tel.numeric' => '電話番号を入力してください',
            'three_tel.digits_between' => '`電話番号は5桁までの数字で入力してください`',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以下で入力してください',
            'categories.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.string' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください',
        ];
    }
}