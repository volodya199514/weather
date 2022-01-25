<?php

namespace App\Services\FormattingData;

class TextFormat extends FormattingWeatherData
{
    private function getFormattingData(): string
    {
        $string = '';

        foreach ($this->weatherData as $key => $airportData) {
            $string .= "Airport $key ".PHP_EOL.implode(PHP_EOL, $airportData).PHP_EOL.PHP_EOL;
        }

        return $string;
    }

    public function getResponse()
    {
        return response($this->getFormattingData())->header('Content-Type', 'text/plain');
    }
}
