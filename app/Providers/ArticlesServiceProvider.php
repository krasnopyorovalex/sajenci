<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\ViewComposers\ArticlesComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container;

/**
 * Class ArticlesServiceProvider
 * @package App\Providers
 */
class ArticlesServiceProvider extends ServiceProvider
{
    /**
     * @throws Container\BindingResolutionException
     */
    public function register(): void
    {
        $this->app->make('view')->composer('layouts.composers.articles', ArticlesComposer::class);
    }
}
