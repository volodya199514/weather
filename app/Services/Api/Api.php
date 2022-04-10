<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Http;

class Api implements ApiInterface
{
    const NOT_SUCCESS_RESPONSE = ["Data for this airport not exists"];

    public function getWeatherDataByAirportCode(string $airport): array
    {
        $response =  Http::get(config('services.weather_api').$airport.'.TXT');

        if ($response->status() == 200) {
            return preg_split('/\r\n|\r|\n/', $response->body());
        }

        return self::NOT_SUCCESS_RESPONSE;
    }
}
