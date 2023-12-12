<?php

namespace App\Repositories;

use App\Models\Breed;
use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BreedRepository extends Repository
{
    public $modelName = Breed::class;

    public function getAllLimit($limit = 8)
    {
        return $this->model->orderByDesc('is_popular')->limit($limit)->get();
    }

    public function getPopular($limit = 4)
    {
        return $this->model->where('is_popular' , 1)->limit($limit)->get();
    }
}
