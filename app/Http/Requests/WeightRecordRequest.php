<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightRecordRequest extends FormRequest
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
            'today_weight' => 'required',
            'date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'today_weight.required' => '本日の体重の入力は必須です',
            'date.required' => '日付の入力は必須です',
        ];
    }
}
