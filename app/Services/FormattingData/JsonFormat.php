<?php

namespace App\Services\FormattingData;

class JsonFormat implements FormattingWeatherDataInterface
{
    public function getResponse(array $weatherData)
    {
        return response()->json($weatherData);
    }
}
