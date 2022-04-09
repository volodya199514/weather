<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Cache;

class ApiCacheDecorator implements ApiInterface
{
    const CACHE_KEY = 'API_WEATHER_DATA_BY_AIRPORT_CODE';
    const SECONDS = 30 * 60;

    public function __construct(private ApiInterface $client)
    {
    }

    public function getWeatherDataByAirportCode(string $airport): array
    {
        $key = sprintf('%s_%s', self::CACHE_KEY, $airport);

        if (Cache::has($key)) {
            return Cache::get($key);
        }

        if ($response = $this->client->getWeatherDataByAirportCode($airport)) {
            Cache::put($key, $response, self::SECONDS);
        }

        return $response;
    }
}
