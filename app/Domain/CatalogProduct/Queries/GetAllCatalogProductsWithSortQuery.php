<?php

declare(strict_types=1);

namespace App\Domain\CatalogProduct\Queries;

use App\Catalog;
use App\CatalogProduct;
use App\Sort\CatalogProductSort;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class GetAllCatalogProductsWithSortQuery
 * @package App\Domain\CatalogProduct\Queries
 */
class GetAllCatalogProductsWithSortQuery
{
    /**
     * @var CatalogProductSort
     */
    private $catalogProductSort;
    /**
     * @var Catalog
     */
    private $catalog;

    /**
     * GetAllCatalogProductsQuery constructor.
     * @param Catalog $catalog
     * @param CatalogProductSort $catalogProductSort
     */
    public function __construct(Catalog $catalog, CatalogProductSort $catalogProductSort)
    {
        $this->catalogProductSort = $catalogProductSort;
        $this->catalog = $catalog;
    }

    /**
     * Execute the job.
     */
    public function handle(): LengthAwarePaginator
    {
        return CatalogProduct::whereCatalogId($this->catalog->id)
            ->sort($this->catalogProductSort)
            ->paginate();
    }
}
