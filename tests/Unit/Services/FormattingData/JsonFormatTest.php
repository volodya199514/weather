<?php

namespace Tests\Unit\Services\FormattingData;

use App\Services\FormattingData\JsonFormat;
use Tests\TestCase;

class JsonFormatTest extends TestCase
{
    public function test_get_response()
    {
        $jsonFormat = new JsonFormat();

        $result = $jsonFormat->getResponse(self::AIRPORTS_RESULTS);

        $this->assertEquals(json_encode(self::AIRPORTS_RESULTS), $result->getContent());
    }
}
