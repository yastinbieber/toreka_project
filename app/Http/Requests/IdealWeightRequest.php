<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdealWeightRequest extends FormRequest
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
            'height' => 'required',
            'weight' => 'required',
            'target_weight' => 'required',
            'exercise_level' => 'required',
            'start_day' => 'required',
            'last_day' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'height.required' => '身長の入力は必須です',
            'weight.required' => '体重の入力は必須です',
            'target_weight.required' => '目標体重の入力は必須です',
            'exercise_level.required' => 'エクササイズレベルの入力は必須です',
            'start_day.required' => 'ボディメイク開始日の入力は必須です',
            'last_day.required' => 'ボディメイク終了日の入力は必須です',
        ];
    }
}
