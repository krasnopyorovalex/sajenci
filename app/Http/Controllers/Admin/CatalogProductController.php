<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\CatalogProduct;
use Domain\CatalogProduct\Commands\CreateCatalogProductCommand;
use Domain\CatalogProduct\Commands\DeleteCatalogProductCommand;
use Domain\CatalogProduct\Commands\UpdateCatalogProductCommand;
use Domain\CatalogProduct\Queries\GetAllCatalogProductsQuery;
use Domain\CatalogProduct\Queries\GetCatalogProductByIdQuery;
use App\Http\Controllers\Controller;
use Domain\CatalogProduct\Requests\CreateCatalogProductRequest;
use Domain\CatalogProduct\Requests\UpdateCatalogProductRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class CatalogProductController
 * @package App\Http\Controllers\Admin
 */
class CatalogProductController extends Controller
{
    /**
     * @param int $catalog
     * @return Factory|View
     */
    public function index(int $catalog)
    {
        $catalogProducts = $this->dispatch(new GetAllCatalogProductsQuery($catalog));

        return view('admin.catalog_products.index', [
            'catalogProducts' => $catalogProducts,
            'catalog' => $catalog
        ]);
    }

    /**
     * @param $catalog
     * @return Factory|View
     */
    public function create($catalog)
    {
        $catalogProduct = new CatalogProduct();

        return view('admin.catalog_products.create', [
            'catalog' => $catalog,
            'labels' => $catalogProduct->getLabels()
        ]);
    }

    /**
     * @param CreateCatalogProductRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateCatalogProductRequest $request)
    {
        $this->dispatch(new CreateCatalogProductCommand($request));

        return redirect(route('admin.catalog_products.index', [
            'catalog' => (int)$request->get('catalog_id')
        ]));
    }

    /**
     * @param int $id
     * @return Factory|View
     */
    public function edit(int $id)
    {
        $catalogProduct = $this->dispatch(new GetCatalogProductByIdQuery($id));

        return view('admin.catalog_products.edit', [
            'catalogProduct' => $catalogProduct
        ]);
    }

    /**
     * @param $id
     * @param UpdateCatalogProductRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdateCatalogProductRequest $request)
    {
        $this->dispatch(new UpdateCatalogProductCommand($id, $request));
        $catalogProduct = $this->dispatch(new GetCatalogProductByIdQuery($id));

        return redirect(route('admin.catalog_products.index', [
            'catalog' => $catalogProduct->catalog_id
        ]));
    }

    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function destroy($id, Request $request)
    {
        $this->dispatch(new DeleteCatalogProductCommand($id));

        return redirect(route('admin.catalog_products.index', [
            'catalog' => $request->post('catalog_id')
        ]));
    }
}
