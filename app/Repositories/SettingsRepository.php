<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\SettingsRepositoryInterface;
use App\Models\Setting;

class SettingsRepository extends BaseAbstract implements SettingsRepositoryInterface
{
    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }
}
