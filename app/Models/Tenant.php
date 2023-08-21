<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name', 'phone', 'occupation', 'place_of_birth', 'birthdate',
        'original_address', 'email', 'identification_document',
        'workplace', 'school', 'workplace_address', 'school_address',
        'identification_document_filename', 'emergency_contact_name',
        'emergency_contact_phone'
    ];
}
