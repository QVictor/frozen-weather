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
        return Http::withHeaders(
            [
                'X-RapidAPI-Host' => env('RAPID_API_HOST'),
                'X-RapidAPI-Key' => env('RAPID_API_KEY')
            ]
        )->get(env('RAPID_API_URL') . '?q=53.1%2C-0.13');
    }
}
