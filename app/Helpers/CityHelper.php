<?php

namespace App\Helpers;

use App\Repositories\CityRepository;
use App\Repositories\Interfaces\CityRepositoryInterface;

class CityHelper
{
    public static function getAllCodes(CityRepositoryInterface $cityRepository)
    {
        return (new CityRepository())->getAllListCodes()->pluck('open_weather_city_id')->implode(',');
    }
}
