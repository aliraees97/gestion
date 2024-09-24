<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rec = [
            [
                'name' => 'Basic',
                'price' => 100,
            ],
            [
                'name' => 'Standard',
                'price' => 200,
            ],
            [
                'name' => 'Premium',
                'price' => 300,
            ],

        ];

        foreach ($rec as $key => $value) {
            Package::create([
                'name' => $value['name'],
                'price' => $value['price'],
            ]);
        }
    }
}
