<?php

namespace App\Interfaces;


interface ProhibitedWordRepositoryInterface  extends BaseInterface
{
    public function updateWords($words);
}
