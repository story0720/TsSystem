<?php

namespace App\Http\Requests\Factory;

use Illuminate\Foundation\Http\FormRequest;

class ManagementRequest extends FormRequest
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
            "category" => 'integer|exists:factorycategorys,ca_id',
            'name' => 'required|string',
            'tel1' => 'required|string|max:20',
            'tel2' => 'string|Nullable',
            'fax' => 'Nullable|string',
            'address' => 'required|string|max:50',
            'memo' => 'Nullable|string',
            'contact' => 'required|string|max:10',
        ];
    }
    public function messages()
    {
        return [
            'category.integer' => '請選擇廠商種類',
            'category.exists' => '廠商種類不存在',
            'name.required' => "請輸入廠商名稱",
            'tel1.required' => '請輸入連絡電話',
            'tel1.max' => '長度最多20個字',
            'address.required' => '請輸入地址',
            'address.string' => '長度最多50個字',
            'tel1.string' => '請輸入連絡電話',
            'contact.max' => '聯絡人長度不能大於十個字',
            'contact.required' => '請輸入聯絡人名稱',
        ];
    }
}
