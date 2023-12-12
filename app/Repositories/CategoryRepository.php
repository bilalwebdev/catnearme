<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CategoryRepository extends Repository
{
    public $modelName = Category::class;

    public function getAllLimit($limit = 8)
    {
        return $this->model->orderByDesc('created_at')->limit($limit)->get();
    }
}
