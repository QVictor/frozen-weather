<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'two_letters_code', 'country_code');
    }

    public function open_weather_data(): HasMany
    {
        return $this->hasMany(OpenWeatherData::class);
    }
}
