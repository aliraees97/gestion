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

                'customer_id' => 1,
                'name' => 'Tesla',
                'model' => 206,
                'license_plate' => 'TS100',
                'color' => 'Silver',
                'package_id' => 1,
                'payment_id' => 1,
                'services' => json_encode(['service 1', 'service 2']),
            ],
            [
                'customer_id' => 2,
                'name' => 'Carola',
                'model' => 105,
                'license_plate' => 'CR105',
                'color' => 'White',
                'package_id' => 2,
                'payment_id' => 2,
                'services' => json_encode(['service 3', 'service 4']),
            ],
            [
                'customer_id' => 3,
                'name' => 'Benz',
                'model' => 989,
                'license_plate' => 'M200',
                'color' => 'Black',
                'package_id' => 3,
                'payment_id' => 3,
                'services' => json_encode(['service 1', 'service 5']),
            ],

        ];

        foreach ($rec as $key => $value) {
            Car::create([
                'customer_id' => $value['customer_id'],
                'name' => $value['name'],
                'model' => $value['model'],
                'color' => $value['color'],
                'license_plate' => $value['license_plate'],
                'package_id' => $value['package_id'],
                'payment_id' => $value['payment_id'],
                'services' => $value['services'],
            ]);
        }
    }
}
