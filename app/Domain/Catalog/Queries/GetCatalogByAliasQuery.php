<?php

declare(strict_types=1);

namespace App\Domain\Catalog\Queries;

use App\Catalog;

/**
 * Class GetCatalogByIdQuery
 * @package App\Domain\Catalog\Queries
 */
class GetCatalogByAliasQuery
{
    /**
     * @var string
     */
    private $alias;

    /**
     * GetCatalogByAliasQuery constructor.
     * @param string $alias
     */
    public function __construct(string $alias)
    {
        $this->alias = $alias;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Catalog::with(['image','catalogs'])
            ->where('alias', $this->alias)
            ->firstOrFail();
    }
}
