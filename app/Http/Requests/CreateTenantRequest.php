<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
class CreateTenantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|string',
            'occupation' => 'required|string',
            'place_of_birth' => 'required|string',
            'birthdate' => 'required|date',
            'original_address' => 'required|string',
            'email' => 'required|email',
            'school' => 'nullable|string',
            'school_address' => 'nullable|string',
            'workplace' => 'nullable|string',
            'workplace_address' => 'nullable|string',
            'identification_document' => 'nullable|string',
            'identification_document_filename' => 'nullable|string',
            'emergency_contact_name' => 'nullable|string',
            'emergency_contact_phone' => 'nullable|string',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}