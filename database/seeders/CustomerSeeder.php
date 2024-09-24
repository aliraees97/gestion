<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rec = [
            [
                'name' => 'steve',
                'email' => 'steve@email.com',
                'phone' => '97125845632',
                'note' => 'This is test note',
            ],
            [
                'name' => 'jack',
                'email' => 'jack@email.com',
                'phone' => '97125845632',
                'note' => 'This is test note',
            ],
            [
                'name' => 'john',
                'email' => 'john@email.com',
                'phone' => '97125845632',
                'note' => 'This is test note',
            ],

        ];

        foreach ($rec as $key => $value) {
            Customer::create([
                'name' => $value['name'],
                'email' => $value['email'],
                'phone' => $value['phone'],
                'note' => $value['note'],
            ]);
        }
    }
}
