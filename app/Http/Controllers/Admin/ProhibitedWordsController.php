<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ProhibitedWordRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProhibitedWordsController extends BaseController
{
    protected
        $viewPart       = 'prohibited_words',
        $updateRequest  = Request::class,
        $route          = 'admin.prohibited_words';
    public function __construct(ProhibitedWordRepositoryInterface $repository){
        parent::__construct($repository,null);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = $this->repository->all()->map(function ($item, $key) {
            return $item->word;
        })->toArray();
        $data = implode(",",$words);
        return view($this->fullView.'.index',compact('data'));
    }
    public function updateAll()
    {
        $request = app($this->updateRequest);
        $this->repository->updateWords($request->words);
        return redirect()->route($this->route.'.index');
    }
}