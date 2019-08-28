<?php

declare(strict_types=1);

namespace App\Domain\Catalog\Queries;

use App\Catalog;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class GetAllCatalogsWithoutChildQuery
 * @package App\Domain\Catalog\Queries
 */
class GetAllCatalogsWithoutChildQuery
{
    /**
     * @var Collection
     */
    private static $catalog;

    /**
     * Execute the job.
     */
    public function handle(): Collection
    {
        if (!self::$catalog) {
            self::$catalog = Catalog::with(['catalogs', 'image'])->where('parent_id', null)->orderBy('pos')->get();
        }

        return self::$catalog;
    }
}
