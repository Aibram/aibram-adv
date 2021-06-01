<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\ContactUsRepositoryInterface;
use App\Models\ContactUs;

class ContactUsRepository extends BaseAbstract implements ContactUsRepositoryInterface
{
    
    public function __construct(ContactUs $model)
    {
        parent::__construct($model);
    }
}
