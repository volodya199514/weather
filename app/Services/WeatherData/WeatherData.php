<?php

namespace App\Services\WeatherData;

use App\Services\Api\ApiInterface;

class WeatherData implements WeatherDataInterface
{
    public function __construct(private ApiInterface $api)
    {
    }

    public function getWeatherDataByAirports(string $airports = ''): array
    {
        $airports = explode(',', $airports);

        $weatherData = [];

        foreach ($airports as $airport) {
            $weatherData[$airport] = $this->api->getWeatherDataByAirportCode($airport);
        }

        return $weatherData;
    }
}
