<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Models\Advertisement;

class AdvertisementRepository extends BaseAbstract implements AdvertisementRepositoryInterface
{
    
    public function __construct(Advertisement $model)
    {
        parent::__construct($model);
    }
    
    public function createAd($data){
        $data['mobile'] = !empty($data['mobile']) ? $data['ext'].$data['mobile'] : null;
        $data['user_id'] = auth()->guard('user')->user()->id;
        $data['category_id'] = !empty($data['subCategory_id']) ? $data['subCategory_id'] : $data['category_id'];
        $data['no_properties'] = count($data['properties']);
        $data['address'] = count($data['properties']);
        $ad = $this->create($data);
        $this->CheckSingleMediaAndAssign($data, $ad, 'photo', $this->model->mainImageCollection);
        $this->CheckMultipleMedia($data, $ad, 'photos', $this->model->secondaryImagesCollection);
        foreach($data['properties'] as $prop){
            $ad->properties()->create($prop);
        }
        $ad->tag($data['tags']);
        return $ad;
    }

    public function firstBySlug($slug){
        return $this->model->findBySlugOrFail($slug);
    }
}
