<?php

namespace App\Services\FormattingData;

class HtmlFormat extends FormattingWeatherData
{
    public function getResponse()
    {
        return response()->view('myPDF',  ['weatherData' => $this->weatherData]);
    }
}
