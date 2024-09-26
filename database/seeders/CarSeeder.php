<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rec = [
            [

                'name' => 'Tesla',
                'model' => 206,
                'license_plate' => 'TS100',
                'color' => 'Silver',
            ],
            [

                'name' => 'Carola',
                'model' => 105,
                'license_plate' => 'CR105',
                'color' => 'White',
            ],
            [

                'name' => 'Benz',
                'model' => 989,
                'license_plate' => 'M200',
                'color' => 'Black',
            ],

        ];

        foreach ($rec as $key => $value) {
            Car::create([

                'name' => $value['name'],
                'model' => $value['model'],
                'license_plate' => $value['license_plate'],
                'color' => $value['color'],
            ]);
        }
    }
}
