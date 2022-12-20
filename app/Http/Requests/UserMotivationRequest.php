<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserMotivationRequest extends FormRequest
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
            'training_frequency' => 'required',
            'purpose' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'training_frequency.required' => 'トレーニング頻度の入力は必須です',
            'purpose.required' => '目的の入力は必須です',
        ];
    }
}
