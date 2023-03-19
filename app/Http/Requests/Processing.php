<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Processing extends FormRequest
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
            'categoryname' => 'required|max:10',
            'processingCreate' => 'required',
            'memo' => 'string|nullable',
        ];
    }
    public function messages()
    {
        return [
            'categoryname.required' => '請輸入加工方法',
            'categoryname.max' => '最長為10個字',
            'processingCreate.required' => '請輸入加工規格及單價',
        ];
    }
}
