<?php

namespace App\Http\Controllers\Website;

use App\Events\Admin\ContactUsRequest as AdminContactUsRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ContactUsRequest;
use App\Interfaces\ContactUsRepositoryInterface;

class ContactUsController extends Controller
{

    protected $repository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContactUsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function contactForm()
    {
        return view('pages.contact');
    }
    
    public function contact(ContactUsRequest $request)
    {
        $data = $request->validated();
        $data['device'] = 'web';
        $model = $this->repository->create($data);
        event(new AdminContactUsRequest($model,__('notifications.admin.new_contact')));
        return back();
    }
}
