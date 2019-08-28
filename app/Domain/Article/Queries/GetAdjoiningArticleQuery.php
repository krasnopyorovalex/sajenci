<?php

declare(strict_types=1);

namespace App\Domain\Article\Queries;

use App\Article;
use App\Domain\Article\DTO\AdjoiningResult;

/**
 * Class GetAdjoiningArticleQuery
 * @package App\Domain\Article\Queries
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
