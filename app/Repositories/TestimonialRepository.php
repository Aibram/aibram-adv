<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\TestimonialRepositoryInterface;
use App\Models\Testimonial;

class TestimonialRepository extends BaseAbstract implements TestimonialRepositoryInterface
{
    
    public function __construct(Testimonial $model)
    {
        parent::__construct($model);
    }

    public function createTestimonial($data){
        $testimonial = $this->create($data);
        $this->CheckSingleMediaAndAssign($data, $testimonial, 'photo', $this->model->mainImageCollection);
        return $testimonial;
    }

    public function updateTestimonial($id,$data){
        $testimonial = $this->updateById($id,$data);
        $this->CheckSingleMediaAndAssign($data, $testimonial, 'photo', $this->model->mainImageCollection);
        return $testimonial;
    }
}
