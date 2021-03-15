<?php

namespace Pyskunov\LaravelRequestId;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Illuminate\Support\ServiceProvider;

class LaravelRequestIdServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-request-id.php', 'laravel-request-id');
    }

    public function boot(): void
    {
        $this->publishes(
            [
                __DIR__ . '/../config/laravel-request-id.php' => config_path('laravel-request-id.php'),
            ]
        );

        Request::macro('uuid', function (): string {
            $requestHeaderKey = config('laravel-request-id.header_key');

            if (! request()->headers->has($requestHeaderKey)) {
                request()->headers->set($requestHeaderKey, Str::uuid()->toString());
            }

            return request()->header($requestHeaderKey);
        });
    }
}
