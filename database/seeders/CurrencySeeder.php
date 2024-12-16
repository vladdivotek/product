<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        Currency::query()->create([
            'name' => 'USD',
            'slug' => 'usd',
        ]);

        Currency::query()->create([
            'name' => 'UAH',
            'slug' => 'uah',
        ]);
    }
}
