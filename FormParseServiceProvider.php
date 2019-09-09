<?php

namespace FormParse\Providers;


use Illuminate\Support\ServiceProvider;

class FormParseServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
       
    }

    public function boot()
{

    $this->publishes([
        __DIR__.'/vendor/FormParse/js/form.js' => public_path('js/form.js'),
    ]);
}
}