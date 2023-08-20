<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('occupation');
            $table->string('place_of_birth');
            $table->date('birthdate');
            $table->text('original_address');
            $table->string('email');
            $table->string('identification_document')->nullable();
            $table->string('workplace')->nullable();
            $table->string('school')->nullable();
            $table->text('workplace_address')->nullable(); // Kolom alamat tempat kerja
            $table->text('school_address')->nullable();
            $table->string('identification_document_filename')->nullable();
            $table->string('emergency_contact_name')->nullable(); // Kolom nama keluarga terdekat
            $table->string('emergency_contact_phone')->nullable();
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};