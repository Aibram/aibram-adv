<?php

namespace App\Interfaces;


interface AdvertisementRepositoryInterface  extends BaseInterface
{
    public function createAd($data);

    public function firstBySlug($slug);

    
}
