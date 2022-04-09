<?php

namespace App\Services\WeatherData;

interface WeatherDataInterface
{
    public function getWeatherDataByAirports(string $airports = ''): array;
}
