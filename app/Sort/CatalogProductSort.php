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
    protected $sorts = ['price'];

    /**
     * Sort the query by a given price.
     *
     * @param string $value
     * @return Builder
     */
    protected function price(string $value): Builder
    {
        return $this->builder->orderBy('price', $value);
    }
}
