<?php

declare(strict_types=1);

namespace Domain\Catalog\Commands;

use App\Catalog;
use Domain\Catalog\Queries\GetCatalogByIdQuery;
use Domain\Image\Commands\DeleteImageCommand;
use Domain\Image\Commands\UploadImageCommand;
use App\Events\RedirectDetected;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateCatalogCommand
 * @package Domain\Catalog\Commands
 */
class UpdateCatalogCommand
{
    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateCatalogCommand constructor.
     * @param int $id
     * @param Request $request
     */
    public function __construct(int $id, Request $request)
    {
        $this->id = $id;
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $catalog = $this->dispatch(new GetCatalogByIdQuery($this->id));
        $urlNew = $this->request->post('alias');

        if ($catalog->getOriginal('alias') !== $urlNew) {
            event(new RedirectDetected($catalog->getOriginal('alias'), str_slug($urlNew), 'catalog.show'));
        }

        if ($this->request->has('image')) {
            if ($catalog->image) {
                $this->dispatch(new DeleteImageCommand($catalog->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $catalog->id, Catalog::class));
        }

        return $catalog->update($this->request->all());
    }
}
