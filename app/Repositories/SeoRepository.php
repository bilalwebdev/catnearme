<?php

namespace App\Repositories;

use App\Models\Seo;

class SeoRepository extends Repository
{
    public $modelName = Seo::class;

    public function getSeoPage($page = 'home') : Seo | null
    {
        return $this->model->where('name', $page)->first();
    }
}
