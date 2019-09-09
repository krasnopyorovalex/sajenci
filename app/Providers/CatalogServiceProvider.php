<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\ViewComposers\CatalogComposer;
use Illuminate\Contracts\Container;
use Illuminate\Support\ServiceProvider;

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
        $this->app->make('view')->composer([
            'layouts.composers.catalog',
            'layouts.composers.box_catalog',
            'layouts.composers.catalog_left_sb'
        ], CatalogComposer::class);
    }
}
