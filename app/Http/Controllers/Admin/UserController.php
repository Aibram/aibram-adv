<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdvertisementDataTable;
use App\DataTables\FavoriteDataTable;
use App\DataTables\RatingDataTable;
use App\DataTables\UserDataTable;
use App\Http\Requests\Admin\UserCreate;
use App\Http\Requests\Admin\UserUpdate;
use App\Interfaces\UserRepositoryInterface;

class UserController extends BaseController
{
    protected
        $viewPart       = 'users',
        $route          = 'admin.users',
        $storeRequest   = UserCreate::class,
        $updateRequest  = UserUpdate::class;
    public function __construct(UserRepositoryInterface $repository){
        parent::__construct($repository,UserDataTable::class);
    }

    public function store()
    {
        $request = app($this->storeRequest);
        $this->repository->createFullUser($request->all());
        return redirect()->route($this->route.'.index');
    }
    
    public function update($id)
    {
        $request = app($this->updateRequest);
        $this->repository->updateFullUser($id,$request->all());
        return redirect()->route($this->route.'.index');
    }

    public function getFavorites($id,FavoriteDataTable $favoritesDataTable)
    {
        return $favoritesDataTable->with(['user_id'=>$id])->render($this->fullView.'.view');
    }

    public function getUserRatings($id,RatingDataTable $ratingDataTable)
    {
        return $ratingDataTable->with(['rated_user_id'=>$id])->render($this->fullView.'.view');
    }
    
    public function getGivenRatings($id,RatingDataTable $ratingDataTable)
    {
        return $ratingDataTable->with(['user_id'=>$id])->render($this->fullView.'.view');
    }
    
    public function getAdvertisements($id,AdvertisementDataTable $ratingDataTable)
    {
        return $ratingDataTable->with(['user_id'=>$id])->render($this->fullView.'.view');
    }
}
