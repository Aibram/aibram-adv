<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Models\Advertisement;
use App\Models\Category;

class AdvertisementRepository extends BaseAbstract implements AdvertisementRepositoryInterface
{
    
    public function __construct(Advertisement $model)
    {
        parent::__construct($model);
    }
    
    public function createAd($data){
        $data['mobile'] = !empty($data['mobile']) ? $data['ext'].$data['mobile'] : null;
        $data['user_id'] = auth()->guard('user')->user()->id;
        $data['no_properties'] = count($data['properties']);
        $data['address'] = "";
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

    public function filterAds($data,$count=4,$page=1,$ordering=[]){
        $newModel = $this->model->active(1);
        if(isset($data['home']) && $data['home']){
            $newModel=$newModel->where('home',$data['home']);
        }
        if(isset($data['city_id']) && $data['city_id']){
            $newModel=$newModel->where('city_id',$data['city_id']);
        }
        if(isset($data['category_id']) && $data['category_id']){
            $newModel=$newModel->whereIn('category_id',explode(",",$data['category_id']));
        }
        if(isset($data['title']) && $data['title']){
            $newModel=$newModel->where('title','like',"%".$data['title']."%");
        }
        foreach($ordering as $column => $direction){
            $newModel=$newModel->orderBy($column, $direction);
        }
        $newModel=$newModel->paginate($count,['*'],'page',$page);
        return $newModel;
    }

    public function featuredAds($user,$count = 4 , $page = 1 , $ordering = ['created_at' => 'desc'] , $paginate=false){
        $this->model = $this->model->newQuery()
            ->join('ad_marketings', function ($q) {
                $q->on('ad_marketings.advertisement_id', '=', 'advertisements.id');
            })
            ->where(function ($query) use($user){
                $query->where('ad_marketings.gender', '=', $user->gender)
                        ->orWhere('ad_marketings.gender', '=', 'all');
            })
            ->where(function ($query) use($user){
                $query->where('ad_marketings.age_from', '>=', $user->age)
                        ->orWhere('ad_marketings.age_to', '<=', $user->age);
            });
        $this->applyConditions(['advertisements.featured' => 1,'ad_marketings.city_id'=>$user->city_id]);
        $this->model = $this->model->groupBy('advertisements.id');
        $this->orderBy($ordering);
        $this->model = $this->model->select(
            [
                'advertisements.*',
            ]
        );
        return $paginate ? $this->model->paginate($count,['*'],'page',$page) : $this->model->get();
    }

    public function updateAd($id,$data){
        $data['mobile'] = !empty($data['mobile']) && $data['contact_method'] == "number" ? $data['ext'].$data['mobile'] : null;
        $data['no_properties'] = count($data['properties']);
        // dd($data);
        $ids = explode(',',$data['oldphotos']);
        $ad = $this->updateById($id,$data,false);
        $this->CheckSingleMediaAndAssign($data, $ad, 'photo', $this->model->mainImageCollection);
        if(count($ids)>0){
            $this->detachMedia($ad,collect($ids));
        }
        $this->CheckMultipleMedia($data, $ad, 'photos', $this->model->secondaryImagesCollection);
        $ad->properties()->delete();
        foreach($data['properties'] as $prop){
            $ad->properties()->create($prop);
        }
        $ad->tag($data['tags']);
        return $ad;
    }
    public function updateAdmin($id,$data){
        $this->checkRequestCheckBoxExists($data,'featured');
        $this->checkRequestCheckBoxExists($data,'home');
        $ad = $this->updateById($id,$data);
        $ad->admarketing()->delete();
        foreach($data['marketing'] as $item){
            $ad->admarketing()->create($item);
        }

    }
}
