<?php

namespace Tests\Unit\Services\FormattingData;

use App\Services\FormattingData\HtmlFormat;
use Tests\TestCase;

class HtmlFormatTest extends TestCase
{
    public function test_get_response()
    {
        $htmlFormat = new HtmlFormat();

        $result = $htmlFormat->getResponse(self::AIRPORTS_RESULTS);

        $view = $this->view('myPDF',  ['weatherData' => self::AIRPORTS_RESULTS]);

        $this->assertEquals($view, $result->getContent());
    }
}
