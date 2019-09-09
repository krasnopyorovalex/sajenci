<?php

declare(strict_types=1);

namespace App\Domain\Info\Commands;

use App\Info;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateInfoCommand
 * @package App\Domain\Info\Commands
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
        $info->save();

        if ($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $info->id, Info::class));
        }

        return true;
    }

}
