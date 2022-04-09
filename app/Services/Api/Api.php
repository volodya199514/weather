<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Http;

class Api implements ApiInterface
{
    public function getWeatherDataByAirportCode(string $airport): array
    {
        $response =  Http::get(config('services.weather_api').$airport.'.TXT');

        if ($response->status() == 200) {
            return preg_split('/\r\n|\r|\n/', $response->body());
        }

        return ["Data for this airport not exists"];
    }
}
