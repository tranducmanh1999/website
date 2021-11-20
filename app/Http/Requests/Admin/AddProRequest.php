<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddProRequest extends FormRequest
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
            'nameproduct'   => 'required|min:10|max:255|unique:products,name_product',
            'idcat'         => 'required',
            'ch_name'       => 'required',
            'img'           => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'price'         => 'required|max:99999999 | min:0',
            'preview'       => 'required|min:20|max:255',
            'qty'           => 'required|min:0|max:99999999'
        ];
    }
    public function messages()
    {
        return [
            'nameproduct.required'   => 'Vui lòng nhập tên sản phẩm !',
            'nameproduct.unique'     => 'Tên sản phẩm bị trùng !',
            'nameproduct.min'        => 'Nhập tổi thiểu 10 ký tự !',
            'nameproduct.max'        => 'Nhập tổi đa 255 ký tự !',
            'nameproduct.required'   => 'Vui lòng nhập tên sản phẩm !',
            'idcat.required'         => 'Vui lòng chọn danh mục !',
            'ch_name.required'       => 'Vui lòng chọn size',
            'qty.max'                => 'Nhập số lượng không quá 99999999 !',
            'qty.min'                => 'Nhập số lượng phải lơn hơn 0 !',
            'price.required.max'     => 'Vui lòng nhập giá sản phẩm',
            'price.required.min'     => 'Vui lòng nhập giá sản phẩm',
            'preview.required'       => 'Vui lòng nhập mô tả',
            'preview.min'            => 'Nhập tối thiểu 20 ký tự',
            'preview.max'            => 'Nhập tối đa 255 ký tự',
            'img.required'           => 'File ảnh không hợp lệ'
        ];
    }
}
