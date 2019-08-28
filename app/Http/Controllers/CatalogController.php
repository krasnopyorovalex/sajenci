<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Catalog;
use App\Domain\Catalog\Queries\GetCatalogByAliasQuery;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Exception;

/**
 * Class CatalogController
 * @package App\Http\Controllers
 */
class CatalogController extends PageController
{
    /**
     * @param string $alias
     * @return Factory|View
     */
    public function show(string $alias = 'index')
    {
        try {

            /** @var $catalog Catalog*/
            $catalog = $this->dispatch(new GetCatalogByAliasQuery($alias));

            $catalog->text = $this->parserService->parse($catalog);

            $products = $catalog->products()->paginate();

        } catch (Exception $exception) {

            return parent::show($alias);
        }

        return view('catalog.index', [
            'catalog' => $catalog,
            'products' => $products
        ]);
    }
}
