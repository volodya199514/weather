<?php

namespace App\Providers;

use App\Services\Api\Api;
use App\Services\Api\ApiCacheDecorator;
use App\Services\Api\ApiInterface;
use App\Services\FormattingData\FormattingWeatherData;
use App\Services\FormattingData\FormattingWeatherDataInterface;
use App\Services\FormattingData\HtmlFormat;
use App\Services\FormattingData\JsonFormat;
use App\Services\FormattingData\PdfFormat;
use App\Services\FormattingData\TextFormat;
use App\Services\WeatherData\WeatherData;
use App\Services\WeatherData\WeatherDataInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ApiInterface::class, function () {
            $client = new Api();

            return new ApiCacheDecorator($client);
        });

        $this->app->singleton(WeatherDataInterface::class, WeatherData::class);

        $this->app->bind(FormattingWeatherDataInterface::class, function () {

            switch ($this->app->request->route('format')) {
                case 'txt':
                    return new TextFormat();
                case 'json':
                    return new JsonFormat();
                case 'pdf':
                    return new PdfFormat();
                case 'html':
                    return new HtmlFormat();
            }

            return new HtmlFormat();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
