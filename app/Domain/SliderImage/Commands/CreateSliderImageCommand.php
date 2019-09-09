<?php

declare(strict_types=1);

namespace Domain\SliderImage\Commands;

use App\Services\UploadImagesService;
use App\SliderImage;

/**
 * Class CreateSliderImageCommand
 * @package Domain\SliderImage\Commands
 */
class CreateSliderImageCommand
{
    private $uploadImage;

    /**
     * CreateSliderImageCommand constructor.
     * @param UploadImagesService $uploadImage
     */
    public function __construct(UploadImagesService $uploadImage)
    {
        $this->uploadImage = $uploadImage;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $sliderImage = new SliderImage();
        $sliderImage->basename = $this->uploadImage->getImageHashName();
        $sliderImage->ext = $this->uploadImage->getExt();
        $sliderImage->slider_id = $this->uploadImage->getEntityId();

        return $sliderImage->save();
    }
}
