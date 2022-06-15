<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'title'  => 'required',
            'description'  => 'required',
            'image'  => 'required',
            'content'  => 'required',
            'status'  => 'required',
            'view'  => 'required',
            'puplish_date'  => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title'  => 'Trường này là bắt buộc',
            'description'  => 'Trường này là bắt buộc',
            'image'  => 'Trường này là bắt buộc',
            'content'  => 'Trường này là bắt buộc',
            'status'  => 'Trường này là bắt buộc',
            'view'  => 'Trường này là bắt buộc',
            'puplish_date'  => 'Trường này là bắt buộc',
        ];
    }
}
