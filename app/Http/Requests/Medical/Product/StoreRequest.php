<?php

namespace App\Http\Requests\Medical\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'medical_card_id' => 'nullable|array',
            'medical_card_ids.*' => 'nullable|integer|exists:medical_cards,id',
        ];
    }
}
