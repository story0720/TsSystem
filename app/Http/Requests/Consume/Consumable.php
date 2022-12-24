<?php

namespace App\Http\Requests\Consume;

use Illuminate\Foundation\Http\FormRequest;

class Consumable extends FormRequest
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
            'standardname' => 'required|string|max:15',
            'standard' => 'max:30',
            'memo' => 'string|nullable|max:50',
        ];
    }
    public function messages()
    {
        return [
            'standardname.required' => '請輸入耗材名稱',
            'standardname.max' => '長度最大為30個字',
            // 'standard.required' => '請輸入耗材規格',
            'standard.max' => '長度最大為10個字',
            'memo.max' => '長度最大為50個字',
        ];
    }
}
