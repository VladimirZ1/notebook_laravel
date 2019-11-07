<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'title.required' => 'Заголовок обязателен',
            'date.required'  => 'Дата обязательна',
        ];
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'date' => 'required',
        ];
    }
}
