<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreBlogRequest extends FormRequest
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
        // Rule::uniqzzue('title')->ignore();
        return [
            'title' => 'required|min:3|unique:posts,title,'. $this->id,
            'description' => 'required|min:10',
            'photo_name' => 'mimes:jpg,png',
           
        ];
    }
}