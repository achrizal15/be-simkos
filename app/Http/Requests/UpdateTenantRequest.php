<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
class UpdateTenantRequest  extends FormRequest
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
            'identification_document' => 'nullable|string',
            'workplace' => 'nullable|string',
            'school' => 'nullable|string',
            'workplace_address' => 'nullable|string',
            'school_address' => 'nullable|string',
            'identification_document_filename' => 'required_if:identification_document_filename_default,null',
            'emergency_contact_name' => 'nullable|string',
            'emergency_contact_phone' => 'nullable|string',
        ];
    }
 
}