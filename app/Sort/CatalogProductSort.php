<?php

declare(strict_types=1);

namespace App\Sort;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class CatalogProductSort
 * @package App\Sort
 */
class CatalogProductSort extends Sort
{
    /**
     * Registered sorts to operate upon.
     *
     * @var array
     */
    protected $sorts = ['sort'];

    /**
     * Allowed types by ORDER BY
     */
    private const ORDER_TYPES = ['asc', 'desc'];

    /**
     * Sort the query by a given price.
     *
     * @param string $value
     * @return Builder
     */
    protected function sort(string $value): Builder
    {
        [$field, $orderType] = explode('_', $value);

        if (!in_array($orderType, self::ORDER_TYPES, true)) {
            return $this->builder;
        }

        return $this->builder->orderBy($field, $orderType);
    }
}
