<?php

declare(strict_types=1);

namespace Domain\Info\Commands;

use Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use App\Info;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateInfoCommand
 * @package Domain\Info\Commands
 */
class CreateInfoCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateInfoCommand constructor.
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
        $info = new Info();
        $info->fill($this->request->all());
        $info->published_at = date('Y-m-d');
        $info->save();

        if ($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $info->id, Info::class));
        }

        return true;
    }
}
