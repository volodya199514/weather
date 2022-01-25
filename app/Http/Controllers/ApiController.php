<?php

namespace App\Http\Controllers;

use App\Services\FormattingData\FormattingWeatherData;

/**
 * @OA\Swagger(
 *   schemes={"http"},
 *   host="weather.local",
 *   @OA\Info(
 *     title="Weather",
 *     description="Weather from API",
 *     version="1.0.0"
 *   )
 * )
 */
class ApiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/weather/{airports}.{format}",
     *     summary="Get weather info by airports in differnt formats",
     *     tags={"Weather"},
     *     @OA\Parameter(
     *         name="airports",
     *         in="path",
     *         description="List of airports separated comma",
     *      ),
     *     @OA\Parameter(
     *         name="format",
     *         in="path",
     *         description="Format data",
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(ref="#/definitions/Weather")
     *         ),
     *     ),
     * )
     */
    public function index(FormattingWeatherData $formattingWeatherData, string $airports = null, string $format = null)
    {
        $formattingWeatherData->setWeatherData($airports);

        return $formattingWeatherData->getResponse();
    }
}

