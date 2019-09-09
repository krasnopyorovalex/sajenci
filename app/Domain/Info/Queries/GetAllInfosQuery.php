<?php

declare(strict_types=1);

namespace Domain\Info\Queries;

use App\Info;

/**
 * Class GetAllInfosQuery
 * @package Domain\Info\Queries
 */
class GetAllInfosQuery
{
    /**
     * @var bool
     */
    private $isPublished;

    /**
     * @var int
     */
    private $limit;

    /**
     * GetAllInfosQuery constructor.
     * @param bool $isPublished
     * @param int $limit
     */
    public function __construct(bool $isPublished = false, int $limit = 0)
    {
        $this->isPublished = $isPublished;
        $this->limit = $limit;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $infos = Info::orderBy('published_at', 'desc');

        if ($this->isPublished) {
            $infos->where('is_published', '1');
        }

        if ($this->limit) {
            return $infos->paginate($this->limit, ['*'], 'page', (int)request('page'));
        }

        return $infos->get();
    }
}
