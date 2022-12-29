<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrMenuRequest extends FormRequest
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
            'menu' => 'required',
            'tr_part_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'menu.required' => '本日の体重の入力は必須です',
            'tr_part_id.required' => '日付の入力は必須です',
        ];
    }
}
