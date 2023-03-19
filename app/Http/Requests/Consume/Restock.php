<?php

namespace App\Http\Requests\Consume;

use Illuminate\Foundation\Http\FormRequest;

class Restock extends FormRequest
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
            'caname' => 'exists:factorycategorys,ca_id',
            'coname' => 'exists:consumes,id',
            'date' => 'date',
            'Factoryname' => 'required|integer',
            'quantity' => 'required|integer|min:0',
            'unitprice' => 'required|integer|min:0',
            'count' => 'required|integer|min:0',
            'specification' => 'required|integer',
            'memo' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'caname.exists' => '請選擇耗材廠商',
            'coname.exists' => '請選擇耗材名稱',
            'date.date' => '請選擇日期',
            'quantity.required' => '請輸入進貨單價',
            'quantity.min' => '進貨單價最小值為0',
            'unitprice.required' => '請輸入進貨數量',
            'unitprice.min' => '進貨數量最小值為0',
            'count.required' => '小計金額不正確',
            'count.min' => '小計金額最小值為0',
            'specification.required' => '請選擇耗材規格',
            'specification.integer' => '請選擇耗材規格',
            'Factoryname.required' => '請選擇耗材廠商',
            'Factoryname.integer' => '請選擇耗材廠商',
        ];
    }
}
