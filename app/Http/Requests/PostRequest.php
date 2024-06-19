<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'=>'required',
            'content'=>'required',
            'files.*'=>'nullable|mimes:jpeg,bmp,png,pdf,odt|max:5120',
        ];
    }

    public function attributes()
    {
        return[
            'title'=>'標題',
            'content'=>'內容',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>':attribute 不可空白',
            'content.required'=>':attribute 不可空白',
        ];

    }
}
