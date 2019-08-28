<?php

namespace App\Services;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Http\UploadedFile;

/**
 * Class UploadImagesService
 * @package App\Services
 */
class UploadImagesService
{

    /**
     * @var int
     */
    private $widthThumb = 320;

    /**
     * @var int
     */
    private $heightThumb = 320;

    /**
     * @var UploadedFile
     */
    private $image;

    /**
     * @var int
     */
    private $entityId;

    /**
     * @var string
     */
    private $entity;

    /**
     * @param Request $request
     * @param string $entity
     * @param int $entityId
     * @return UploadImagesService
     */
    public function upload(Request $request, string $entity, int $entityId): self
    {
        $this->entityId = $entityId;
        $this->entity = $entity;
        $this->image = $request->file('upload');

        $this->image->store($this->getSavePath());

        return $this;
    }

    /**
     * @param int $widthThumb
     * @return UploadImagesService
     */
    public function setWidthThumb(int $widthThumb): self
    {
        $this->widthThumb = $widthThumb;
        return $this;
    }

    /**
     * @param int $heightThumb
     * @return UploadImagesService
     */
    public function setHeightThumb(int $heightThumb): UploadImagesService
    {
        $this->heightThumb = $heightThumb;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageHashName():string
    {
        $chunks = explode('.', $this->image->hashName());

        return strval(array_shift($chunks));
    }

    /**
     * @return string
     */
    public function getExt(): string
    {
        return $this->image->extension();
    }

    /**
     * @return int
     */
    public function getEntityId(): int
    {
        return $this->entityId;
    }

    /**
     * @return string
     */
    private function getSavePath(): string
    {
        return 'public'. DIRECTORY_SEPARATOR . $this->entity . DIRECTORY_SEPARATOR . $this->entityId . DIRECTORY_SEPARATOR;
    }

    /**
     * @return $this
     */
    public function createThumb(): self
    {
        (new ImageManager())
            ->make($this->image)
            ->resize($this->widthThumb, $this->heightThumb)
            ->save(public_path('storage' . DIRECTORY_SEPARATOR . $this->entity . DIRECTORY_SEPARATOR . $this->entityId . DIRECTORY_SEPARATOR . $this->getImageHashName() . '_thumb.' . $this->getExt()));

        return $this;
    }
}
