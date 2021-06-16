<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialDataTable;
use App\Http\Requests\Admin\TestimonialCreate;
use App\Http\Requests\Admin\TestimonialUpdate;
use App\Interfaces\TestimonialRepositoryInterface;

class TestimonialController extends BaseController
{
    protected
        $viewPart       = 'testimonials',
        $route          = 'admin.testimonials',
        $storeRequest   = TestimonialCreate::class,
        $updateRequest  = TestimonialUpdate::class;
    public function __construct(TestimonialRepositoryInterface $repository){
        parent::__construct($repository,TestimonialDataTable::class);
    }

    public function store()
    {
        $request = app($this->storeRequest);

        $this->repository->createTestimonial($request->all());
        return redirect()->route($this->route.'.index');
    }

    public function update($id)
    {
        $request = app($this->updateRequest);
        $this->repository->updateTestimonial($id,$request->all());
        return redirect()->route($this->route.'.index');
    }
}