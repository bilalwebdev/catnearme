<?php

namespace App\Repositories;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CountryRepository extends Repository
{
    public $modelName = Country::class;
}
