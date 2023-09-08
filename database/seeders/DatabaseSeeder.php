<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Feature;
use App\Models\Room;
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
        \App\Models\User::factory()->create([
            'name' => 'Rachel Velicia',
            'username' => $this->generateUsername('Rachel Velicia'),
            'email' => 'su@simkos.com',
        ]);
        $this->call([
            TenantSeeder::class,
            FeatureSeeder::class
        ]);
        Room::factory(1)->create()->each(function ($room) {
            $features = Feature::inRandomOrder()->limit(rand(1, 3))->get();
            $room->features()->attach($features);
        });
        
    }
}