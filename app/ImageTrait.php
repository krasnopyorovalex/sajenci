<?php

declare(strict_types=1);

namespace App;

/**
 * Trait ImageTrait
 * @package App
 */
trait ImageTrait
{
    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image
            ? sprintf('<img src="%s" alt="%s" title="%s" />', $this->image->path, $this->image->alt, $this->image->title)
            : '';
    }
}
