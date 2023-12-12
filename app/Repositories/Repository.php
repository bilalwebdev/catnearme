<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Repository extends Builder
{
    /**
     * @var Builder
     */
    public $model;

    public function __construct()
    {
        $this->model = app($this->modelName);
    }

    /**
     * @param array $data
     * @return void
     */

    public function findByField(array $data = [])
    {
        $this->model->where($data)->first();
    }
}
