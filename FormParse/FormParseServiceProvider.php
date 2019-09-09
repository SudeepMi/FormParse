<?php

namespace Sudeep\FormParser;


use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //juu
    }

    public function boot()
{

    $jsPath = __DIR__.'/../js/form.js';
    $publicPath = public_path('assets/js/form.js');
    $this->publishes([
        $jsPath => $publicPath,
    ],'public');
}
}
