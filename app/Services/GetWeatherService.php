<?php

namespace App\Services;

use App\Helpers\CityHelper;
use App\Models\OpenWeatherData;
use App\Repositories\Interfaces\CityRepositoryInterface;
use Illuminate\Support\Carbon;

class GetWeatherService
{
    /**
     * Return weather list for current day
     *
     * @param CityRepositoryInterface $cityRepository
     * @return void
     */
    public function make(CityRepositoryInterface $cityRepository): void
    {
        $cities = CityHelper::getAllCodes($cityRepository);
        $apiAnswer = (new OpenWeatherService())->getCurrentWeatherData($cities);
        OpenWeatherData::insert($this->prepareDataFromInsert($apiAnswer));
    }

    private function prepareDataFromInsert($apiAnswer): array
    {
        $res = [];
        foreach ($apiAnswer['list'] as $city) {
            $res[] = [
                'city_id' => $city['id'],
                'weather_condition_code' => $city['weather'][0]['id'],
                'weather_condition_main_type' => $city['weather'][0]['main'],
                'weather_condition_description' => $city['weather'][0]['description'],
                'weather_condition_icon' => $city['weather'][0]['icon'],
                'temp' => $city['main']['temp'],
                'humidity' => $city['main']['humidity'],
                'wind_speed' => $city['wind']['speed'],
                'created_at' => Carbon::createFromTimestamp($city['dt']),
                'updated_at' => Carbon::createFromTimestamp($city['dt']),
            ];
        }
        return $res;
    }

}
