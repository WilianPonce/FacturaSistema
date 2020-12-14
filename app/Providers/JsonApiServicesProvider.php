<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\support\Str;
use App\JsonApi\JsonApiBuilder;

class JsonApiServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     * @throws ReflectionException
     */
    public function boot()
    {
        Builder::mixin(new jsonApiBuilder);
    }
}
