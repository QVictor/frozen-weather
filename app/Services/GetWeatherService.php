<?php

namespace App\Services;

use App\Models\OpenWeatherData;
use App\Repositories\Interfaces\CityRepositoryInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class GetWeatherService
{
    /**
     * Return weather list for current day
     *
     * @return PromiseInterface|Response
     */
    public function make(CityRepositoryInterface $cityRepository)
    {
        $cities = $cityRepository->getAllListCodes()->pluck('open_weather_city_id');
        $apiAnswer = Http::get('https://api.openweathermap.org/data/2.5/group?id=' . $cities->implode(',') . '&units=metric&appid=' . env('OPEN_WEATHER_API_KEY'));
        $jsonString = $apiAnswer->getBody()->getContents();
        $jsonCollection = collect(json_decode($jsonString, true));

        $res = [];
        foreach ($jsonCollection->get('list') as $city) {
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
        OpenWeatherData::insert($res);
        return $res;
    }

}
