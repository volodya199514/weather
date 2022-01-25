<?php

namespace App\Services\FormattingData;

class JsonFormat extends FormattingWeatherData
{
    public function getResponse()
    {
        return response()->json($this->weatherData);
    }
}
