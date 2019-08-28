<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Article\Queries\GetArticleByAliasQuery;
//use App\Domain\Article\Queries\GetAdjoiningArticleQuery;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * @param string $alias
     * @return Factory|View
     */
    public function show(string $alias)
    {
        $article = $this->dispatch(new GetArticleByAliasQuery($alias));
        //$adjoiningArticles = $this->dispatch(new GetAdjoiningArticleQuery());

        return view('article.index', [
            'article' => $article
//            'next' => $adjoiningArticles->nextOrFirst($article),
//            'prev' => $adjoiningArticles->prevOrLast($article)
        ]);
    }
}
