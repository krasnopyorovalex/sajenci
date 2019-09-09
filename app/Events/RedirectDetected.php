<?php

declare(strict_types=1);

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class RedirectDetected
 * @package App\Events
 */
class RedirectDetected
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string
     */
    public $urlOld;

    /**
     * @var string
     */
    public $urlNew;

    /**
     * @var string
     */
    public $routeName;

    /**
     * RedirectDetected constructor.
     * @param string $urlOld
     * @param string $urlNew
     * @param string $routeName
     */
    public function __construct(string $urlOld, string $urlNew, string $routeName = 'page.show')
    {
        $this->urlOld = route($routeName, ['alias' => $urlOld], false);
        $this->urlNew = route($routeName, ['alias' => $urlNew], false);
    }
}
