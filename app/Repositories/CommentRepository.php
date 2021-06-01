<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\CommentRepositoryInterface;
use App\Models\AdComment;
use App\Models\ContactUs;

class CommentRepository extends BaseAbstract implements CommentRepositoryInterface
{
    
    public function __construct(AdComment $model)
    {
        parent::__construct($model);
    }
}
