<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'productName' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'productPrice' => 'required|numeric|min:0',
            'productQuantity' => 'required|numeric|min:0',
            'productDescription' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'productName.required' => 'Vui lòng nhập tên sản phẩm.',
            'productName.string' => 'Tên sản phẩm phải là chuỗi.',
            'productName.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'category_id.required' => 'Vui lòng chọn loại sản phẩm.',
            'category_id.exists' => 'Loại sản phẩm không hợp lệ.',
            'productPrice.required' => 'Vui lòng nhập giá sản phẩm.',
            'productPrice.numeric' => 'Giá sản phẩm phải là số.',
            'productPrice.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',
            'productQuantity.required' => 'Vui lòng nhập số lượng sản phẩm.',
            'productQuantity.numeric' => 'Số lượng sản phẩm phải là số.',
            'productQuantity.min' => 'Số lượng sản phẩm phải lớn hơn hoặc bằng 0.',
            'productDescription.required' => 'Vui lòng nhập mô tả sản phẩm.',
            'productDescription.string' => 'Mô tả sản phẩm phải là chuỗi.',
            'productDescription.max' => 'Mô tả sản phẩm không được vượt quá 255 ký tự.',
        ];
    }
}
