<?php

namespace App\Http\Requests\Consulting\Card;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'desc' => 'required|string',
            'content' => 'required|string',
            'address' => 'required|string',
            'coordinate_l' => 'required|string',
            'coordinate_r' => 'required|string',
            'preview_image' => 'nullable|file',
            'user_email' => 'required|string',
            'logo' => 'nullable|file',
            'phone' => 'required|integer',
            'link' => 'required|string',
            'name_link' => 'required|string',
            'consulting_tag_ids' => 'nullable|array',
            'consulting_tag_ids.*' => 'nullable|integer|exists:consulting_tags,id',
        ];
    }
    public function messages(){
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Имя должно быть строкой',
            'content.required' => 'Это поле необходимо для заполнения',
            'coordinate.required' => 'Это поле необходимо для заполнения',
            'phone.integer' => 'Это поле необходимо для заполнения',
            'coordinate.string' => 'Это поле необходимо для заполнения',
        ];
    }
}
