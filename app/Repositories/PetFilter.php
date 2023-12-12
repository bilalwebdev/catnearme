<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Country;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetFilter extends Repository
{
    public $modelName = Pet::class;

    public function getAllLimit($limit = 8)
    {
        return $this->model->orderByDesc('created_at')->limit($limit)->get();
    }

    public function withSearchPercentage($breed, $color, $country, $keywords, $breeder)
    {

        $unverifiedPercentage = 30; // Adjust the percentage as needed
        $verifiedPercentage = 70; // Adjust the percentage as needed
        $perPage = 30; // Adjust the number of items per page as needed

        $unverifiedUsersCount = $this->model->whereRelation('user', 'is_verify' , '=' , 0)->count();
        $verifiedUsersCount   = $this->model->whereRelation('user', 'is_verify' , '=' , 1)->count();

        $unverifiedRandomCount = ($unverifiedUsersCount * $unverifiedPercentage) / 100;
        $verifiedRandomCount = ($verifiedUsersCount * $verifiedPercentage) / 100;

        $listings = $this->model->with('user')->where(function ($q) use ($breed, $color, $country, $keywords, $breeder) {

            if (!$country == '') {
                $q->whereRelation('user', 'country_id', $country);
            }

            if (!$breed == '') {
                $q->whereRelation('breed', 'slug', $breed);
            }

            if (!$color == '') {
                $q->where('color', '=', $color);
            }


            if (!is_null($keywords)) {
                $q->where('keywords', 'LIKE', '%' . $keywords . '%');
            }


            if (!is_null($breeder)) {
                $q->whereRelation('user', 'username', $breeder);
            }

        })->orderByRaw("RAND() * $unverifiedRandomCount + RAND() * $verifiedRandomCount ASC")
            ->where('status' , 'active')
            ->paginate($perPage);

        return $listings;

    }

    public function withFilterSearch($breed, $color, $country, $keywords, $breeder)
    {
        return $this->model->with('user')->where(function ($q) use ($breed, $color, $country, $keywords, $breeder) {

            if (!$country == '') {
                $q->whereRelation('user', 'country_id', $country);
            }

            if (!$breed == '') {
                $q->whereRelation('breed', 'slug', $breed);

            }

            if (!$color == '') {
                $q->where('color', '=', $color);
            }


            if (!is_null($keywords)) {
                $q->where('keywords', 'LIKE', '%' . $keywords . '%');
            }


            if (!is_null($breeder)) {
                $q->whereRelation('user', 'username', $breeder);
            }

        })->orderByDesc('created_at')->where('status' , 'active')->paginate(25);

    }

    /**
     * @return array|\Closure|\Illuminate\Contracts\Foundation\Application[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\HigherOrderBuilderProxy[]|\Illuminate\Foundation\Application[]|mixed|object|null
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */

    public function verify()
    {
        return $this->model->whereHas('user', function ($q) {
            return $q->where('is_verify', 1);
        })->limit(10)->get()->shuffle();
    }

    /**
     * @return Collection
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */

    public function activeList() : Collection
    {
        return $this->model->where('status' , 'active')->get();
    }

    /**
     * @return mixed
     */

    public function deletePetsPlan()
    {
        $ids = auth()->user()->pets()->orderByDesc('created_at')->skip(3)->take(10000)->pluck('id');

        return $this->model->whereIn('id', $ids)->delete();
    }

    /**
     * @param Pet $pet
     * @return Pet
     */

    public function renew(Pet $pet) : bool
    {
        $days = $pet->user->plan->feature->days_long;

        $pet->update([
            'expired_at' => now()->addDays($days),
            'status'     => 'active'
        ]);

        return $pet->increment('renew');
    }
}
