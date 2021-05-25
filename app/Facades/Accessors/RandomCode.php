<?php

namespace App\Facades\Accessors;


class RandomCode
{
    public function getCode(int $digits) {
        return rand(pow(10,$digits-1)+1, pow(10,$digits)-1);
    }
}