<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as vie;

class TestServiceProvider extends ServiceProvider
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
        View::composer('*', function (vie $view) {
            $view->with(['worktypes' => '<br>here comes from service provider']);
        });
        /*view()->share('worktypes', '<br>here comes from service provider'); this also works*/
    }
}
