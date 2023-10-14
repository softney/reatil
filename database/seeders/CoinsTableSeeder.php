<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coin;

class CoinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coin::create([
            'type' => 'Billetes',
            'value' => '20000'
        ]);
        Coin::create([
            'type' => 'Billetes',
            'value' => '10000'
        ]);
        Coin::create([
            'type' => 'Billetes',
            'value' => '5000'
        ]);
        Coin::create([
            'type' => 'Billetes',
            'value' => '2000'
        ]);
        Coin::create([
            'type' => 'Billetes',
            'value' => '1000'
        ]);
        Coin::create([
            'type' => 'Monedas',
            'value' => '500'
        ]);
        Coin::create([
            'type' => 'Monedas',
            'value' => '100'
        ]);
        Coin::create([
            'type' => 'Monedas',
            'value' => '50'
        ]);
        Coin::create([
            'type' => 'Monedas',
            'value' => '10'
        ]);
        Coin::create([
            'type' => 'Otros',
            'value' => '0'
        ]);
    }
}
