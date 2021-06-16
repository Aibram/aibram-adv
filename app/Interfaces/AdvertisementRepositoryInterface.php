<?php

namespace App\Interfaces;


interface AdvertisementRepositoryInterface  extends BaseInterface
{
    public function createAd($data);

    public function firstBySlug($slug);

    public function filterAds($data,$count=4,$page=1,$ordering=[]);

    public function updateAd($id,$data);

    public function updateAdmin($id,$data);
    
}
