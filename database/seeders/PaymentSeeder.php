<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rec = [
            [
                'name' => 'Credit Card',
            ],
            [
                'name' => 'COD',
            ],
            [
                'name' => 'Stripe'
            ],
            [
                'name' => 'Paypal'
            ],

        ];

        foreach ($rec as $key => $value) {
            Payment::create([
                'name' => $value['name'],
            ]);
        }
    }
}
