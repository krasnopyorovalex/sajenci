<?php

namespace App\Http\Controllers\Admin;

use Domain\Slider\Commands\CreateSliderCommand;
use Domain\Slider\Commands\DeleteSliderCommand;
use Domain\Slider\Commands\UpdateSliderCommand;
use Domain\Slider\Queries\GetAllSlidersQuery;
use Domain\Slider\Queries\GetSliderByIdQuery;
use App\Http\Controllers\Controller;
use Domain\Slider\Requests\CreateSliderRequest;
use Domain\SliderImage\Requests\UpdateSliderImageRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class SliderController
 * @package App\Http\Controllers\Admin
 */
class SliderController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $sliders = $this->dispatch(new GetAllSlidersQuery());

        return view('admin.sliders.index', [
            'sliders' => $sliders
        ]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * @param CreateSliderRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateSliderRequest $request)
    {
        $this->dispatch(new CreateSliderCommand($request));

        return redirect(route('admin.sliders.index'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $slider = $this->dispatch(new GetSliderByIdQuery($id));

        return view('admin.sliders.edit', [
            'slider' => $slider
        ]);
    }

    /**
     * @param $id
     * @param UpdateSliderImageRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdateSliderImageRequest $request)
    {
        $this->dispatch(new UpdateSliderCommand($id, $request));

        return redirect(route('admin.sliders.index'));
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteSliderCommand($id));

        return redirect(route('admin.sliders.index'));
    }
}
