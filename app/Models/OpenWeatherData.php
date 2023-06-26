<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenWeatherData extends Model
{
    use HasFactory;

    protected $table = 'open_weather_data';

    const WEATHER_CONDITIONS_CODES = [
        'Thunderstorm',
        'Drizzle',
        'Rain',
        'Snow',
        'Atmosphere',
        'Clear',
        'Clouds',
    ];
}
