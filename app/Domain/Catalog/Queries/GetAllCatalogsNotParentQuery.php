<?php

declare(strict_types=1);

namespace Domain\Catalog\Queries;

use App\Catalog;

/**
 * Class GetAllCatalogsNotParentQuery
 * @package Domain\Catalog\Queries
 */
class GetAllCatalogsNotParentQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Catalog::where('parent_id')->with(['catalogs'])->orderBy('pos')->get();
    }
}
