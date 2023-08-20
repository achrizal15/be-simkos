<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tenant::create([
            'name' => 'John Doe',
            'phone' => '081234567890',
            'occupation' => 'Software Engineer',
            'place_of_birth' => 'Jakarta',
            'birthdate' => Carbon::create(1990, 5, 15),
            'original_address' => 'Jl. Jend. Sudirman No.123, Jakarta',
            'email' => 'john.doe@example.com',
            'identification_document' => 'KTP-123456789',
            'workplace' => 'Tech Company',
            'school' => 'University of XYZ',
            'workplace_address' => 'Tech Park, Jakarta',
            'school_address' => 'University Campus, Jakarta',
            'identification_document_filename' => 'ktp_john_doe.jpg',
            'emergency_contact_name' => 'Jane Smith',
            'emergency_contact_phone' => '082345678901',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
