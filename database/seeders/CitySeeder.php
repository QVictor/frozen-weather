<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::insert([
            [
                'name' => 'Moscow',
                'open_weather_city_id' => 524901,
                'country_code' => 'RU'
            ],
            [
                'name' => 'Saint Petersburg',
                'open_weather_city_id' => 498817,
                'country_code' => 'RU'
            ],
            [
                'name' => 'London',
                'open_weather_city_id' => 2643741,
                'country_code' => 'GB'
            ]
        ]);
    }
}
