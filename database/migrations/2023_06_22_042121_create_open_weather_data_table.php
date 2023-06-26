<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('open_weather_data', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            //TODO записать доступные значения https://openweathermap.org/weather-conditions
            $table->integer('weather_condition_code');
            $table->enum('weather_condition_main_type', ['Thunderstorm', 'Drizzle', 'Rain', 'Snow', 'Atmosphere', 'Clear', 'Clouds']);
            $table->string('weather_condition_description');
            $table->string('weather_condition_icon');
            $table->float('temp');
            $table->integer('humidity');
            $table->float('wind_speed');
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_weather_data');
    }
};
