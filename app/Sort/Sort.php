<?php

declare(strict_types=1);

namespace App\Sort;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Sort
{

    /**
     * @var Request
     */
    protected $request;

    /**
     * The Eloquent builder.
     *
     * @var Builder
     */
    protected $builder;

    /**
     * Registered sorts to operate upon.
     *
     * @var array
     */
    protected $sorts = [];

    /**
     * Create a new ThreadFilters instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply the sort.
     *
     * @param  Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->getSorts() as $sort => $value) {
            if (method_exists($this, $sort)) {
                $this->$sort($value);
            }
        }

        return $this->builder;
    }

    /**
     * @return array
     */
    protected function getSorts(): array
    {
        return array_filter($this->request->only($this->sorts));
    }
}
