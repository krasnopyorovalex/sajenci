<?php

declare(strict_types=1);

namespace App\Http\ViewComposers;

use Domain\Catalog\Queries\GetAllCatalogsWithoutChildQuery;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CatalogComposer
 * @package App\Http\ViewComposers
 */
class CatalogComposer
{
    use DispatchesJobs;

    /**
     * @param View $view
     */
    public function compose(View $view): void
    {
        $catalog = $this->dispatch(new GetAllCatalogsWithoutChildQuery());

        $view->with('catalog', $catalog);
    }
}
