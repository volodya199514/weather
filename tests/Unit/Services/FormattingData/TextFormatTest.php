<?php

namespace Tests\Unit\Services\FormattingData;

use App\Services\FormattingData\TextFormat;
use Tests\TestCase;

class TextFormatTest extends TestCase
{
    public function test_get_response()
    {
        $textFormat = new TextFormat();

        $result = $textFormat->getResponse(self::AIRPORTS_RESULTS);

        $string = '';

        foreach (self::AIRPORTS_RESULTS as $key => $airportData) {
            $string .= "Airport $key ".PHP_EOL.implode(PHP_EOL, $airportData).PHP_EOL.PHP_EOL;
        }

        $this->assertEquals($string, $result->getContent());
    }
}
