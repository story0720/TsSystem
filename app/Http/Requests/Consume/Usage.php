<?php

namespace App\Http\Requests\Consume;

use Illuminate\Foundation\Http\FormRequest;

class Usage extends FormRequest
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
            'standardname' => 'exists:consumes,id',
            'quantity' => 'required|min:0|integer',
            'receiver' => 'required|max:10|string',
        ];
    }
    public function messages()
    {
        return [
            'standardname.exists' => "請選擇耗材名稱",
            'quantity.required' => "請輸入領取數量",
            'quantity.integer' => "領取數量必須是整數",
            'quantity.min' => "領取數量最少為0",
            'receiver.required' => "請輸入領取人",
            'receiver.max' => "輸入長度最長為10",
        ];
    }
}
