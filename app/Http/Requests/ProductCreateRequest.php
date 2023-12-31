<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class ProductCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    { 
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            // 'main_image_file_name' => 'required',  
            'main_image_file_name' => 'sometimes|required_without:main_image', 
            'sizes' => 'nullable|array',
            'colors' => 'nullable|array',
        ];
    }
    public function messages()
    {
        return [
            'main_image_file_name' => __('Please Upload the Main Image')
        ];
    }
}
