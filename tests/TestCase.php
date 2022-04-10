<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    const AIRPORTS_RESULTS = [
        'airport1' => ['Airport 1 result'],
        'airport2' => ['Airport 2 result'],
        'airport3' => ['Airport 3 result'],
    ];
}
