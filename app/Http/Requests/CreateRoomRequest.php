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
            'price' => 'required|numeric',
            'image_path' =>  'required|string',
            'simple_description' => 'required|string|max:255',
            'description' => 'required|string',
            'features_id' => 'sometimes|array|exists:features,id',
        ];
    }
}
