<?php

namespace App\Services\Api;

interface ApiInterface
{
    public function getWeatherDataByAirportCode(string $airport): array;
}
