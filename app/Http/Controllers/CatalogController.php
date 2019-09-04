<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Catalog;
use App\Domain\Catalog\Queries\GetCatalogByAliasQuery;
use App\Domain\CatalogProduct\Queries\GetAllCatalogProductsWithSortQuery;
use App\Services\CanonicalService;
use App\Services\TextParserService;
use App\Sort\CatalogProductSort;
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
     * @var CatalogProductSort
     */
    private $catalogProductSort;

    /**
     * CatalogController constructor.
     *
     * @param TextParserService $parserService
     * @param CanonicalService $canonicalService
     * @param CatalogProductSort $catalogProductSort
     */
    public function __construct(
        TextParserService $parserService,
        CanonicalService $canonicalService,
        CatalogProductSort $catalogProductSort
    ) {
        parent::__construct($parserService, $canonicalService);

        $this->catalogProductSort = $catalogProductSort;
    }

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

            $products = $this->dispatch(new GetAllCatalogProductsWithSortQuery($catalog, $this->catalogProductSort));

        } catch (Exception $exception) {

            return parent::show($alias);
        }

        return view('catalog.index', [
            'catalog' => $catalog,
            'products' => $products
        ]);
    }
}
