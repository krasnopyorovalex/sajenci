<?php

declare(strict_types=1);

namespace Domain\Info\Commands;

use Domain\Image\Commands\DeleteImageCommand;
use Domain\Info\Queries\GetInfoByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteInfoCommand
 * @package Domain\Info\Commands
 */
class DeleteInfoCommand
{
    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteInfoCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $info = $this->dispatch(new GetInfoByIdQuery($this->id));

        if ($info->image) {
            $this->dispatch(new DeleteImageCommand($info->image));
        }

        return $info->delete();
    }
}
