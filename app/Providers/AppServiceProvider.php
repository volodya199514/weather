<?php

namespace App\Providers;

use App\Services\FormattingData\FormattingWeatherData;
use App\Services\FormattingData\HtmlFormat;
use App\Services\FormattingData\JsonFormat;
use App\Services\FormattingData\PdfFormat;
use App\Services\FormattingData\TextFormat;
use Illuminate\Routing\Route;
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
        $this->app->bind(FormattingWeatherData::class, function () {

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
