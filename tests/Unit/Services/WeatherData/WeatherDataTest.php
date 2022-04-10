<?php

namespace Tests\Unit\Services\WeatherData;

use App\Services\Api\Api;
use App\Services\WeatherData\WeatherData;
use Mockery;
use Tests\TestCase;

class WeatherDataTest extends TestCase
{
    public function test_get_weather_data_by_airports()
    {
        $airports = implode(',', array_keys(self::AIRPORTS_RESULTS));

        $apiMock = Mockery::mock(Api::class);

        foreach (self::AIRPORTS_RESULTS as $airportName => $airportResult) {
            $apiMock->shouldReceive('getWeatherDataByAirportCode')
                ->with($airportName)
                ->andReturn($airportResult);
        }

        $weatherData = new WeatherData($apiMock);

        $this->assertEquals(self::AIRPORTS_RESULTS, $weatherData->getWeatherDataByAirports($airports));
    }
}
