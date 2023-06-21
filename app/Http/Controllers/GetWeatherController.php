<?php

namespace App\Http\Controllers;

use App\Services\GetWeatherService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class GetWeatherController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __invoke()
    {
        return (new GetWeatherService())->make()->json();
    }
}
