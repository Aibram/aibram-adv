<?php

namespace App\Observers;

use App\Facades\NotificationInitator;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\City;
use App\Notifications\AdvertisementCreate;
use App\Notifications\AdvertisementUpdate;
use Illuminate\Support\Facades\Notification;

class AdvertisementObserver
{

    public function creating(Advertisement $advertisement)
    {
        $advertisement->status = 1;
        $advertisement->address = "";
        $advertisement->category_name = $advertisement->category->name;
        $advertisement->city_name = $advertisement->city->name;
        $advertisement->country_id = $advertisement->city->country_id;
        $advertisement->category_hierarchy_ids = $advertisement->category->category_hierarchy_ids;
        $advertisement->avg_rate = 0;
        $advertisement->uid = generateAdUniqueId(7);
    }
    /**
     * Handle the Advertisement "created" event.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return void
     */
    public function created(Advertisement $advertisement)
    {
        $advertisement->user()->increment('no_ads');
        $advertisement->category()->increment('no_ads');
        $advertisement->city()->increment('no_ads');
        $advertisement->country()->increment('no_ads');
        $advertisement->statuses()->create([
            'status' => $advertisement->status
        ]);
        NotificationInitator::init($advertisement,'advertisement_created',__('notifications.ad_create',['title' => $advertisement->title]),$advertisement->user,AdvertisementCreate::class);
    }

    /**
     * Handle the Advertisement "updating" event.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return void
     */
    public function updating(Advertisement $advertisement)
    {
        if ($advertisement->isDirty(['category_id'])){
            $category = Category::where('id','=',$advertisement->getOriginal('category_id'));
            if($category->first()->no_ads>0){
                $category->decrement('no_ads');
            }
        }
        if ($advertisement->isDirty(['city_id'])){
            $city = City::where('id','=',$advertisement->getOriginal('city_id'));
            if($city->first()->no_ads>0){
                $city->decrement('no_ads');
            }
            if($city->first()->country->no_ads>0){
                $city->first()->country()->decrement('no_ads');
            }
        }
        
        
    }

    /**
     * Handle the Advertisement "updated" event.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return void
     */
    public function updated(Advertisement $advertisement)
    {
        if ($advertisement->isDirty(['status'])){
            $advertisement->statuses()->create([
                'status' => $advertisement->status
            ]);
        }
        if ($advertisement->isDirty(['category_id'])){
            $advertisement->category_name = $advertisement->category->name;
            $advertisement->category_hierarchy_ids = $advertisement->category->category_hierarchy_ids;
            $advertisement->category()->increment('no_ads');
        }
        if ($advertisement->isDirty(['city_id'])){
            $advertisement->city_name = $advertisement->city->name;
            $advertisement->country_id = $advertisement->city->country_id;
            $advertisement->city()->increment('no_ads');
            $advertisement->country()->increment('no_ads');
        }

        if($advertisement->isDirty(['status']) && $advertisement->status){
            NotificationInitator::init($advertisement,'advertisement_removed',__('notifications.ad_remove',['title' => $advertisement->title]),$advertisement->user,AdvertisementUpdate::class);
        }
        else{
            NotificationInitator::init($advertisement,'advertisement_updated',__('notifications.ad_update',['title' => $advertisement->title]),$advertisement->user,AdvertisementUpdate::class);
        }
    }

    /**
     * Handle the Advertisement "deleting" event.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return void
     */
    public function deleting(Advertisement $advertisement)
    {
        NotificationInitator::init($advertisement,'advertisement_removed',__('notifications.ad_remove',['title' => $advertisement->title]),$advertisement->user,AdvertisementUpdate::class);
    }

    /**
     * Handle the Advertisement "restored" event.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return void
     */
    public function restored(Advertisement $advertisement)
    {
        //
    }

    /**
     * Handle the Advertisement "force deleted" event.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return void
     */
    public function forceDeleted(Advertisement $advertisement)
    {
        //
    }
}
