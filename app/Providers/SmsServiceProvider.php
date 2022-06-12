<?php

namespace App\Providers;

use App\Contracts\SmsContract;
use App\Services\SmsService;
use Illuminate\Support\ServiceProvider;
dd('i am here');

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Register a shared binding in the container.
         */
        $this->app->singleton(SmsContract::class, function () {
            return new SmsService('TwilloGateway');
        });
    }

    public function provides(): array
    {
        return [
            SmsContract::class
        ];
    }
}
