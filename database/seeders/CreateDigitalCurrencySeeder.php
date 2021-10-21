<?php

namespace Database\Seeders;

use App\Models\DigitalCurrency;
use Illuminate\Database\Seeder;

class CreateDigitalCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currency = [
            [
                'currency_name' => 'Bitcoin',
                'currency_price' => '61,872.70'
            ],
            [
                'currency_name' => 'Ethereum',
                'currency_price' => '3,801.50'
            ],
            [
                'currency_name' => 'XRP',
                'currency_price' => '1.08'
            ],
            [
                'currency_name' => 'Dogecoin',
                'currency_price' => '0.255000'
            ],
        ];
        foreach($currency as $key => $value){
            DigitalCurrency::create($value);
        }
    }
}
