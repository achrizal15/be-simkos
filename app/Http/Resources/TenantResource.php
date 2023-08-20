<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenantResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'occupation' => $this->occupation,
            'place_of_birth' => $this->place_of_birth,
            'birthdate' => $this->birthdate,
            'original_address' => $this->original_address,
            'email' => $this->email,
            'identification_document' => $this->identification_document,
            'workplace' => $this->workplace,
            'school' => $this->school,
            'workplace_address' => $this->workplace_address,
            'school_address' => $this->school_address,
            'identification_document_filename' => $this->identification_document_filename,
            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_phone' => $this->emergency_contact_phone,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
    

}
