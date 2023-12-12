<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\Breed;
use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VideoRepository extends Repository
{
    public $modelName = Video::class;

    public function getAllLimit($limit = 3)
    {
        return $this->model->orderByDesc('created_at')->limit($limit)->get();
    }

    public function getHomeVideo()
    {
        return $this->model
            ->where('type' , 'home')
            ->where('is_active' , 1)
            ->first();
    }
}
