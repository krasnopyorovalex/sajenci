<?php

namespace App\Providers;

use App\Http\ViewComposers\MenuComposer;
use Illuminate\Contracts\Container;
use Illuminate\Support\ServiceProvider;

/**
 * Class MenuServiceProvider
 * @package App\Providers
 */
class MenuServiceProvider extends ServiceProvider
{
    /**
     * @throws Container\BindingResolutionException
     */
    public function register(): void
    {
        $this->app->make('view')->composer('layouts.app', MenuComposer::class);
    }
}
