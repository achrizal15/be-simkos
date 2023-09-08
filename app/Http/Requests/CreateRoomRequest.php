<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'yearly_price' => 'required|numeric',
            'daily_price' => 'required|numeric',
            'monthly_price' => 'required|numeric',
            'image_path' => 'required|file',
            'simple_description' => 'required|string|max:255',
            'description' => 'required|string',
            'features_id' => 'sometimes|array|exists:features,id',
        ];
    }
}