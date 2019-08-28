<?php

declare(strict_types=1);

namespace App\Http\ViewComposers;

use App\Domain\Article\Queries\GetAllArticlesQuery;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ArticlesComposer
 * @package App\Http\ViewComposers
 */
class ArticlesComposer
{
    private const LIMIT = 3;

    use DispatchesJobs;

    /**
     * @param View $view
     */
    public function compose(View $view): void
    {
        /** @var Collection $collection */
        $articles = $this->dispatch(new GetAllArticlesQuery(true, self::LIMIT));

        $view->with('articles', $articles);
    }
}
