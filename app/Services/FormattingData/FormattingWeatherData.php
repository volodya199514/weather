<?php

namespace App\Services\FormattingData;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

abstract class FormattingWeatherData
{
    protected array $weatherData = [];

    public function setWeatherData(string $airports = '')
    {
        $airports = explode(',', $airports);

        foreach ($airports as $airport) {
            if (Cache::has($airport)) {
                $this->weatherData[$airport] = Cache::get($airport);
            } else {
                $request = Http::get(config('services.weather_api').$airport.'.TXT');

                if ($request->status() == 200) {
                    $this->weatherData[$airport] = preg_split('/\r\n|\r|\n/', $request->body());
                    Cache::remember($airport, 1800, function () use ($airport) {
                        return $this->weatherData[$airport];
                    });
                } else {
                    $this->weatherData[$airport] = ["Data for this airport not exists"];
                }
            }

        }
    }

    abstract public function getResponse();
}
