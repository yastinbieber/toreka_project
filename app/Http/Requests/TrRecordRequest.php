<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrRecordRequest extends FormRequest
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
            'tr_date' => 'required',
            'part' => 'required',
            'menu' => 'required',
            'set_type' => 'required',
            'weight_first' => 'required',
            'reps_first' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tr_date.required' => '日付の入力は必須です',
            'part.required' => '部位の入力は必須です',
            'menu.required' => 'メニューの入力は必須です',
            'set_type.required' => 'セットタイプの入力は必須です',
            'weight_first.required' => '1セット目の重量の入力は必須です',
            'reps_first.required' => '1セット目の回数の入力は必須です',
        ];
    }
}
