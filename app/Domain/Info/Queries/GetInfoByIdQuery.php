<?php

declare(strict_types=1);

namespace Domain\Info\Queries;

use App\Info;

/**
 * Class GetInfoByIdQuery
 * @package Domain\Info\Queries
 */
class GetInfoByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetInfoByIdQuery constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Info::with(['image'])->findOrFail($this->id);
    }
}
