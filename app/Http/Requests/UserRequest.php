<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'area' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'area.required' => '都道府県は必須です',
            'birthday.required' => '誕生日の入力は必須です',
            'gender.required' => '性別の入力は必須です',
        ];
    }
}
