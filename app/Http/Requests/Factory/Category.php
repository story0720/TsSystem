<?php

namespace App\Http\Requests\Factory;

use Illuminate\Foundation\Http\FormRequest;

class Category extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=>'required|string|max:10',
            'memo'=>'string|Nullable',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'請輸入種類名稱',
            'name.max'=>'長度最大為10個字',
        ];
    }
}
