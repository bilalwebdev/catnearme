<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\Breed;
use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BlogRepository extends Repository
{
    public $modelName = Blog::class;

    public function getAllLimit($limit = 3)
    {
        return $this->model->orderByDesc('created_at')->limit($limit)->get();
    }

    public function getPopular($limit = 4)
    {
        return $this->model->where('is_popular' , 1)->limit($limit)->get();
    }

    /**
     * @param Blog $blog
     * @return mixed
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */

    public function related(Blog $blog)
    {
        return $this->model->where('category_id', $blog->category_id)->limit(2)->get()->except($blog->category_id);
    }
}
