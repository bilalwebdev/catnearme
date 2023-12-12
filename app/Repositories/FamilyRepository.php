<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Country;
use App\Models\Family;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FamilyRepository extends Repository
{
    public $modelName = Family::class;

    /**
     * @param array $data
     * @return Family
     */

    public function store(array $data = []) : Family
    {
        $name = $data['name'];

        return $this->model->firstOrCreate(['name' => $name] , $data);
    }
}
