<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Page\Commands\CreatePageCommand;
use App\Domain\Page\Commands\DeletePageCommand;
use App\Domain\Page\Commands\UpdatePageCommand;
use App\Domain\Page\Queries\GetAllPagesQuery;
use App\Domain\Page\Queries\GetPageByIdQuery;
use App\Domain\Slider\Queries\GetAllSlidersQuery;
use App\Http\Controllers\Controller;
use App\Page;
use Domain\Page\Requests\CreatePageRequest;
use Domain\Page\Requests\UpdatePageRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class PageController
 * @package App\Http\Controllers\Admin
 */
class PageController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $pages = $this->dispatch(new GetAllPagesQuery);

        return view('admin.pages.index', [
            'pages' => $pages
        ]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $page = new Page();
        $sliders = $this->dispatch(new GetAllSlidersQuery());

        return view('admin.pages.create', [
            'templates' => $page->getTemplates(),
            'sliders' => $sliders
        ]);
    }

    /**
     * @param CreatePageRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreatePageRequest $request)
    {
        $this->dispatch(new CreatePageCommand($request));

        return redirect(route('admin.pages.index'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $page = $this->dispatch(new GetPageByIdQuery($id));
        $sliders = $this->dispatch(new GetAllSlidersQuery());

        return view('admin.pages.edit', [
            'page' => $page,
            'sliders' => $sliders
        ]);
    }

    /**
     * @param $id
     * @param UpdatePageRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdatePageRequest $request)
    {
        $this->dispatch(new UpdatePageCommand($id, $request));

        return redirect(route('admin.pages.index'));
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $this->dispatch(new DeletePageCommand($id));

        return redirect(route('admin.pages.index'));
    }
}
