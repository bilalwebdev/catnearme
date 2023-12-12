<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\BlogRepository;
use App\Repositories\BreedRepository;
use App\Repositories\CountryRepository;

use App\Repositories\PetRepository;
use App\Repositories\CategoryRepository;
use App\Models\Page;
use DB;

class SitemapController extends Controller
{

        public function index(Request $r)
        {
           
            $posts = (new BlogRepository)->model->first();
            $breeds    = (new BreedRepository())->model->first();
  
            $pets    = (new PetRepository())->model->first();
            $countries = (new CountryRepository)->model->first();
            $categories = (new CategoryRepository)->model->first();

            
            $pages = Page::all();

            return response()->view('sitemaps.index', compact('posts','breeds','pets','countries','pages'))
              ->header('Content-Type', 'text/xml');
    
        }

        public function posts(){

          $posts = (new BlogRepository)->model->get();

          return response()->view('sitemaps.posts', compact('posts'))
              ->header('Content-Type', 'text/xml');
        }


        public function breeds(){

          $breeds    = (new BreedRepository())->model->get();

          return response()->view('sitemaps.breeds', compact('breeds'))
              ->header('Content-Type', 'text/xml');
        }

        public function pets(){

          $pets    = (new PetRepository())->model->get();

          return response()->view('sitemaps.pets', compact('pets'))
              ->header('Content-Type', 'text/xml');
        }


        public function categories(){

          $categories = (new CategoryRepository)->model->get();

          return response()->view('sitemaps.categories', compact('categories'))
              ->header('Content-Type', 'text/xml');
        }

        public function countries(){

          $countries = (new CountryRepository)->model->get();

          return response()->view('sitemaps.countries', compact('countries'))
              ->header('Content-Type', 'text/xml');
        }

        public function pages(){

          $pages = Page::all();

          return response()->view('sitemaps.pages', compact('pages'))
              ->header('Content-Type', 'text/xml');
        }
    }
