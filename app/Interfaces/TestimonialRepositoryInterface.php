<?php

namespace App\Interfaces;


interface TestimonialRepositoryInterface  extends BaseInterface
{
    public function createTestimonial($data);
    public function updateTestimonial($id,$data);
}
