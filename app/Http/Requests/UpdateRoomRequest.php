<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'image_path' => 'required_if:image_path_old,null',
            'simple_description' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'features_id' => 'sometimes|array|exists:features,id',
        ];
    }
}
