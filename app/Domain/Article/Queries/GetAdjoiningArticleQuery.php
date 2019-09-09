<?php

declare(strict_types=1);

namespace Domain\Article\Queries;

use App\Article;
use Domain\Article\DTO\AdjoiningResult;

/**
 * Class GetAdjoiningArticleQuery
 * @package Domain\Article\Queries
 */
class GetAdjoiningArticleQuery
{
    /**
     * @return AdjoiningResult
     */
    public function handle(): AdjoiningResult
    {
        return new AdjoiningResult(Article::orderByDesc('published_at')->get());
    }
}
