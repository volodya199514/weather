<?php

namespace App\Services\FormattingData;

interface FormattingWeatherDataInterface
{
    public function getResponse(array $weatherData);
}
