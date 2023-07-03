<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class OpenWeatherService
{
    protected $api_key;

    public function __construct()
    {
        $this->api_key = env('OPEN_WEATHER_API_KEY');
    }

    public function getCurrentWeatherData(string $cities)
    {
        try {
            $answer = Http::get(env('OPEN_WEATHER_URL_WITH_VERSION') . '/group?id=' . $cities . '&units=metric&appid=' . env('OPEN_WEATHER_API_KEY'));
            return self::httpAnswerToArray($answer);
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }

    public static function httpAnswerToArray(Response $answer): array
    {
        $jsonString = $answer->getBody()->getContents();
        return json_decode($jsonString, true);

    }
}
