<?php

namespace App\Services\FormattingData;

class HtmlFormat implements FormattingWeatherDataInterface
{
    public function getResponse(array $weatherData)
    {
        return response()->view('myPDF',  ['weatherData' => $weatherData]);
    }
}
