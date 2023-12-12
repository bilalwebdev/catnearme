<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SeederUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'CatNearMe',
            'last_name'  => 'CatNearMe',
            'username'   => 'CatNearMe',
            'email'      => 'CatNearMe@catnear.me',
            'password'   => Hash::make('Uniq0der'),
            'is_admin'   => 1
        ]);

        User::create([
            'first_name' => 'Denis',
            'last_name'  => 'developer',
            'username'   => 'UNIQDEVELOPER',
            'email'      => 'uniqdeveloper@yandex.ru',
            'password'   => Hash::make('Uniq0der'),
            'is_admin'   => 1
        ]);
    }
}
