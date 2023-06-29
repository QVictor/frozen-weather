<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\Interfaces\CityRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CityRepository implements CityRepositoryInterface
{
    public function all(): Collection
    {
        return City::all();
    }

    public function getAllListCodes(): Collection
    {
        return City::all('open_weather_city_id');
    }
}
