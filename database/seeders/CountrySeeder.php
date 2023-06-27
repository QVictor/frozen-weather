<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::insert([
            [
                'name' => 'Russia',
                'two_letters_code' => 'RU',
            ],
            [
                'name' => 'United Kingdom',
                'two_letters_code' => 'GB',
            ]
        ]);
    }
}
