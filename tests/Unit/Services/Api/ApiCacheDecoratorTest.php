<?php

namespace Tests\Unit\Services\Api;

use App\Services\Api\Api;
use App\Services\Api\ApiCacheDecorator;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class ApiCacheDecoratorTest extends TestCase
{
    const AIRPORT_CODE = 'airport';
    const CACHE_RETURN_VALUE = ['Cache value'];

    public function test_get_weather_data_by_airport_code_has_cache()
    {
        Cache::shouldReceive('has')
            ->once()
            ->with(sprintf('%s_%s', ApiCacheDecorator::CACHE_KEY, self::AIRPORT_CODE))
            ->andReturn(true);

        Cache::shouldReceive('get')
            ->once()
            ->with(sprintf('%s_%s', ApiCacheDecorator::CACHE_KEY, self::AIRPORT_CODE))
            ->andReturn(self::CACHE_RETURN_VALUE);

        $api = new Api();

        $apiCache = new ApiCacheDecorator($api);

        $responseData = $apiCache->getWeatherDataByAirportCode(self::AIRPORT_CODE);

        $this->assertEquals(self::CACHE_RETURN_VALUE, $responseData);
    }

    public function test_get_weather_data_by_airport_code_has_not_cache()
    {
        $apiMock = $this->createMock(Api::class);

        $apiMock->method('getWeatherDataByAirportCode')->willReturn(self::CACHE_RETURN_VALUE);

        $apiCache = new ApiCacheDecorator($apiMock);

        Cache::shouldReceive('has')
            ->once()
            ->with(sprintf('%s_%s', ApiCacheDecorator::CACHE_KEY, self::AIRPORT_CODE))
            ->andReturn(false);

        Cache::shouldReceive('put')
            ->once()
            ->with(
                sprintf('%s_%s', ApiCacheDecorator::CACHE_KEY, self::AIRPORT_CODE),
                self::CACHE_RETURN_VALUE,
                ApiCacheDecorator::SECONDS
            );

        $responseData = $apiCache->getWeatherDataByAirportCode(self::AIRPORT_CODE);

        $this->assertEquals(self::CACHE_RETURN_VALUE, $responseData);
    }
}
