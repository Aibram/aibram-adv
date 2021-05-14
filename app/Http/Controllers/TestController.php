<?php

namespace App\Http\Controllers;

use App\Repositories\TestRepositoryInterface;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $testRepository;

    public function __construct(TestRepositoryInterface $testRepository){
        $this->testRepository = $testRepository;
    }

    
}
