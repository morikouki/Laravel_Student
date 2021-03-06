<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\HelloComposer;
use App\Http\Validators\HelloValidator;
use Illuminate\Support\Facades\Validator;

class HelloServiceProvider extends ServiceProvider
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
     */
    public function boot()
    {
        //
        $validator = $this->app['validator'];
        $validator->resolver(function ($translator, $data, $rules, $message) {
            return new HelloValidator($translator, $data, $rules, $message);
        });
    }
}
