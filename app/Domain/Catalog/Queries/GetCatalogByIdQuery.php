<?php

declare(strict_types=1);

namespace App\Domain\Catalog\Queries;

use App\Catalog;

/**
 * Class GetCatalogByIdQuery
 * @package App\Domain\Catalog\Queries
 */
class GetCatalogByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetCatalogByIdQuery constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Catalog::with(['image', 'catalogs'])->findOrFail($this->id);
    }
}
