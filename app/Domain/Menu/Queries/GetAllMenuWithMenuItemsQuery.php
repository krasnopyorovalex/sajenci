<?php

declare(strict_types=1);

namespace App\Domain\Menu\Queries;

use App\Menu;

/**
 * Class GetAllMenuWithMenuItemsQuery
 * @package App\Domain\Menu\Queries
 */
class GetAllMenuWithMenuItemsQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Menu::with(['menuItems' => static function ($query) {
            return $query->where('parent_id', null)->orderBy('pos')->with(['menuItems' => static function ($query) {
                return $query->with(['menuItems']);
            }]);
        }])->get();
    }
}
