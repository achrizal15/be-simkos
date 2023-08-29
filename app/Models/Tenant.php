<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'phone',
        'occupation',
        'place_of_birth',
        'birthdate',
        'original_address',
        'email',
        'identification_document',
        'workplace',
        'school',
        'workplace_address',
        'school_address',
        'identification_document_filename',
        'emergency_contact_name',
        'emergency_contact_phone'
    ];
    protected function birthdate(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => Carbon::parse($value)->format('Y-m-d'),
            get: fn(string $value) => Carbon::createFromDate($value)->format('d/m/Y'),
        );
    }
    protected function getIdentificationDocumentFilenameAttribute($value)
    {
        $path = asset('storage/' . $value);
        return $path;
    }



}