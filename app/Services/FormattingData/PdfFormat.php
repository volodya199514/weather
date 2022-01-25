<?php

namespace App\Services\FormattingData;

use PDF;

class PdfFormat extends FormattingWeatherData
{
    public function getResponse()
    {
        $pdf = PDF::loadView('myPDF', ['weatherData' => $this->weatherData]);

        return $pdf->stream();
    }
}
