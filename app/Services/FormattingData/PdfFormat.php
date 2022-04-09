<?php

namespace App\Services\FormattingData;

use PDF;

class PdfFormat implements FormattingWeatherDataInterface
{
    public function getResponse(array $weatherData)
    {
        $pdf = PDF::loadView('myPDF', ['weatherData' => $weatherData]);

        return $pdf->stream();
    }
}
