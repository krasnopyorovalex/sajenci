<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\ViewComposers\CatalogComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container;

/**
 * Class CatalogServiceProvider
 * @package App\Providers
 */
class CatalogServiceProvider extends ServiceProvider
{
    /**
     * @throws Container\BindingResolutionException
     */
    public function register(): void
    {
        $this->app->make('view')->composer(['layouts.composers.catalog', 'layouts.composers.box_catalog'], CatalogComposer::class);
    }
}
