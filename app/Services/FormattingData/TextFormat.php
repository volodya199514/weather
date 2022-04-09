<?php

namespace App\Services\FormattingData;

class TextFormat implements FormattingWeatherDataInterface
{
    public function getResponse(array $weatherData)
    {
        return response($this->getFormattingData($weatherData))->header('Content-Type', 'text/plain');
    }

    private function getFormattingData(array $weatherData): string
    {
        $string = '';

        foreach ($weatherData as $key => $airportData) {
            $string .= "Airport $key ".PHP_EOL.implode(PHP_EOL, $airportData).PHP_EOL.PHP_EOL;
        }

        return $string;
    }
}
