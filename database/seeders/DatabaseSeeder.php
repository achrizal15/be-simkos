<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Traits\GeneratesUsername;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use GeneratesUsername;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'su',
            'username' => $this->generateUsername('su'),
            'email' => 'su@simkos.com',
        ]);
        $this->call([
            TenantSeeder::class
        ]);
    }
}