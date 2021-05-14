<?php


namespace App\Traits;

use Optix\Media\HasMedia;

trait MediaTrait
{
    use HasMedia;

    public $mainImageCollection = 'main';

    public $secondaryImagesCollection ='secondary';

    public function getMainImage(){
        return $this->getFirstMediaUrl($this->mainImageCollection);
    }
    public function getSecondaryImages(){
        return $this->getMedia($this->secondaryImagesCollection)
                    ->map(fn($media, $key) => $media->getUrl(''));
    }
}