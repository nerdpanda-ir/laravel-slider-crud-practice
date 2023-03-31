<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
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
            'title' => 'max:64',
            'description' => 'max:255' ,
            'thumbnial' => 'file|image|max:1024' ,
            'active' => 'boolean' ,
        ];
    }
    public function messages()
    {
        return [
            'title.max' => 'حداکثر کاراکتر :attribute باید :max باشد ' ,
            'description.max' => 'حداکثر کاراکتر :attribute باید :max باشد ' ,
            'thumbnial.file' => ' عکس باید از نوع فایل باشد ' ,
            'thumbnial.image' => ' عکس باید از نوع image باشد ' ,
            'thumbnial.max' => ' حداکثر :attribute باید :max کیلو بایت باشد  ' ,
        ];
    }
}
