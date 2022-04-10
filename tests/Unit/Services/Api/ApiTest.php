<?php

namespace Tests\Unit\Services\Api;

use App\Services\Api\Api;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ApiTest extends TestCase
{
    const RESPONSE_200 = <<<END
Boryspil, Ukraine (UKBB) 50-20N 030-58E 122M
Feb 23, 2022 - 10:30 PM EST / 2022.02.24 0330 UTC
Wind: from the S (190 degrees) at 2 MPH (2 KT):0
Visibility: 3 mile(s):0
Sky conditions: mostly cloudy
Weather: light rain; mist
Temperature: 33 F (1 C)
Dew Point: 33 F (1 C)
Relative Humidity: 100%
Pressure (altimeter): 30.12 in. Hg (1020 hPa)
ob: UKBB 240330Z 19001MPS 5000 -RA BR SCT008 BKN016 01/01 Q1020 TEMPO 1000 BR
cycle: 3
END;

    public function test_get_weather_data_by_airport_code_status_200()
    {
        Http::fake([
            '*' => Http::response(self::RESPONSE_200, 200),
        ]);

        $api = new Api();

        $response = $api->getWeatherDataByAirportCode('airports');

        $this->assertEquals(preg_split('/\r\n|\r|\n/', self::RESPONSE_200), $response);
    }

    public function test_get_weather_data_by_airport_code_status_not_200()
    {
        Http::fake([
            '*' => Http::response(self::RESPONSE_200, 404),
        ]);

        $api = new Api();

        $response = $api->getWeatherDataByAirportCode('airports');

        $this->assertEquals(API::NOT_SUCCESS_RESPONSE, $response);
    }
}
