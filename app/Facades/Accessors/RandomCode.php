<?php

namespace App\Facades\Accessors;


class RandomCode
{
    public function getCode(int $digits) {
        return rand(11111, 99999);
    }
}