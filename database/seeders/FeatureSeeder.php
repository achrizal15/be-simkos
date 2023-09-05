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
                'icon' => 'pi-shield'
            ],
            [
                'name' => 'Dapur',
                'icon' => 'pi-shopping-bag'
            ],
            [
                'name' => 'AC',
                'icon' => 'pi-server'
            ],
            [
                'name' => 'Tempat Parkir',
                'icon' => 'pi-car'
            ],
            [
                'name' => 'Free Wifi',
                'icon' => 'pi-wifi'
            ],
            [
                'name' => 'TV',
                'icon' => 'pi-desktop'
            ],
            [
                'name' => 'Dua Orang',
                'icon' => 'pi-users'
            ],
            [
                'name' => 'Single/1 Orang',
                'icon' => 'pi-user'
            ],
            [
                'name' => 'Kamar Mandi Dalam',
                'icon' => 'pi-filter'
            ],

            // Add more features with their respective "pi" icons as needed
        ];

        // Insert data into the "features" table
        foreach ($features as $feature) {
            DB::table('features')->insert($feature);
        }
    }
}
