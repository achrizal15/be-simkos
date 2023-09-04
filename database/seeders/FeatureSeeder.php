<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'name' => 'Security & CCTV',
                'icon' => 'pi pi-shield'
            ],
            [
                'name' => 'Dapur',
                'icon' => 'pi pi-shopping-bag'
            ],
            [
                'name' => 'AC',
                'icon' => 'pi pi-server'
            ],
            [
                'name' => 'Tempat Parkir',
                'icon' => 'pi pi-car'
            ],
            [
                'name' => 'Free Wifi',
                'icon' => 'pi pi-wifi'
            ],
            [
                'name' => 'TV',
                'icon' => 'pi pi-desktop'
            ],
            [
                'name' => 'Dua Orang',
                'icon' => 'pi pi-users'
            ],
            [
                'name' => 'Single/1 Orang',
                'icon' => 'pi pi-user'
            ],
            [
                'name' => 'Kamar Mandi Dalam',
                'icon' => 'pi pi-filter'
            ],

            // Add more features with their respective "pi" icons as needed
        ];

        // Insert data into the "features" table
        foreach ($features as $feature) {
            DB::table('features')->insert($feature);
        }
    }
}
