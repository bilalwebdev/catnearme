<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\Breed;
use App\Models\Category;
use App\Models\ContactForm;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ContactsRepository extends Repository
{
    public $modelName = ContactForm::class;

    /**
     * @param array $form
     * @return \#P#C\App\Repositories\Repository.modelName|(\#P#C\App\Repositories\Repository.modelName&\Illuminate\Contracts\Foundation\Application)|\#P#S\App\Repositories\Repository.modelName|(\#P#S\App\Repositories\Repository.modelName&\Illuminate\Contracts\Foundation\Application)|\Illuminate\Contracts\Foundation\Application|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|\Illuminate\Foundation\Application|mixed
     */

    public function store(array $form = [])
    {
        return $this->model->create($form);
    }
}
