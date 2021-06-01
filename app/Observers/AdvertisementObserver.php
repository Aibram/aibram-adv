<?php

namespace App\Observers;

use App\Models\Advertisement;
use App\Notifications\AdvertisementCreate;
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
        $advertisement->avg_rate = 0;
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
        Notification::send($advertisement->user, new AdvertisementCreate($advertisement->toArray()));
    }

    /**
     * Handle the Advertisement "updated" event.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return void
     */
    public function updated(Advertisement $advertisement)
    {
        //
    }

    /**
     * Handle the Advertisement "deleted" event.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return void
     */
    public function deleted(Advertisement $advertisement)
    {
        //
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
