<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'category_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'price' => 'required',
            'address' => 'required',
            'images' => 'required|min:1'
        ];
    }

     
}
