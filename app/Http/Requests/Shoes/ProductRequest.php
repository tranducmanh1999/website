<?php

namespace App\Http\Requests\Shoes;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'size'  => 'required',
            'qty'   => 'required|min:0|max:99999999'
        ];
    }
    public function messages()
    {
        return [
            'size.required'  => 'Vui lòng chọn size',
            'qty.max'        => 'Nhập số lượng không quá 99999999 !',
            'qty.min'        => 'Nhập số lượng phải lơn hơn 0 !',
        ];
    }
}
