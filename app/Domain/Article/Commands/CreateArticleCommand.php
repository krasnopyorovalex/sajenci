<?php

declare(strict_types=1);

namespace Domain\Article\Commands;

use App\Article;
use Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateArticleCommand
 * @package Domain\Article\Commands
 */
class CreateArticleCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateArticleCommand constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $article = new Article();
        $article->fill($this->request->all());
        $article->published_at = date('Y-m-d');
        $article->save();

        if ($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $article->id, Article::class));
        }

        return true;
    }
}
