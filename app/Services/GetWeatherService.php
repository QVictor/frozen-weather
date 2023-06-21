<?php

namespace App\Services;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class GetWeatherService
{
    /**
     * Return weather list for current day
     *
     * @return PromiseInterface|Response
     */
    public function make(): PromiseInterface|Response
    {
        return Http::get('https://api.openweathermap.org/data/2.5/group?id=524901,703448,2643743&units;=metric&appid=' . env('OPEN_WEATHER_API_KEY'));
    }
}
