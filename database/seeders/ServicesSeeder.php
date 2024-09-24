<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rec = [
            [
                'name' => 'service 1',
                'price' => 100,
            ],
            [
                'name' => 'service 2',
                'price' => 200,
            ],
            [
                'name' => 'service 3',
                'price' => 300,
            ],
            [
                'name' => 'service 4',
                'price' => 400,
            ],
            [
                'name' => 'service 5',
                'price' => 500,
            ],

        ];

        foreach ($rec as $key => $value) {
            Service::create([
                'name' => $value['name'],
                'price' => $value['price'],
            ]);
        }
    }
}
