<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\ReportRepositoryInterface;
use App\Models\Report;

class ReportRepository extends BaseAbstract implements ReportRepositoryInterface
{
    public function __construct(Report $model)
    {
        parent::__construct($model);
    }
}