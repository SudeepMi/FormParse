<?php

namespace FormParse;


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

    $jsPath = '/js/form.js';
    $publicPath = public_path('js/form.js');
    $this->publishes([
        $jsPath => $publicPath,
    ],'public');
}
}
