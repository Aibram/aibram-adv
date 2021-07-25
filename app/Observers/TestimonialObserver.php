<?php

namespace App\Observers;

use App\Models\Testimonial;

class TestimonialObserver
{
    /**
     * Handle the Testimonial "created" event.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return void
     */
    public function created(Testimonial $testimonial)
    {
        forgetCache('cache_testimonials');
        manipulateCache('cache_testimonials','cache_testimonials_data');
    }

    /**
     * Handle the Testimonial "updated" event.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return void
     */
    public function updated(Testimonial $testimonial)
    {
        forgetCache('cache_testimonials');
        manipulateCache('cache_testimonials','cache_testimonials_data');
    }

    /**
     * Handle the Testimonial "deleted" event.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return void
     */
    public function deleted(Testimonial $testimonial)
    {
        forgetCache('cache_testimonials');
        manipulateCache('cache_testimonials','cache_testimonials_data');
    }

    /**
     * Handle the Testimonial "restored" event.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return void
     */
    public function restored(Testimonial $testimonial)
    {
        //
    }

    /**
     * Handle the Testimonial "force deleted" event.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return void
     */
    public function forceDeleted(Testimonial $testimonial)
    {
        //
    }
}
