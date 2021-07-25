<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\ProhibitedWordRepositoryInterface;
use App\Models\ProhibitedWords;

class ProhibitedWordRepository extends BaseAbstract implements ProhibitedWordRepositoryInterface
{
    
    public function __construct(ProhibitedWords $model)
    {
        parent::__construct($model);
    }

    public function updateWords($words)
    {
        $data = collect(explode(",",$words))->map(function ($item, $key) {
            return [
                "word" => $item
            ];
        })->toArray();
        $this->deleteBy();
        $this->insert($data);
        return $this->getModel()->newQuery()->latest()->first();
    }
}
