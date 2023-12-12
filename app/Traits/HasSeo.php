<?php

namespace App\Traits;

use App\Models\Blog;
use App\Models\Breed;
use App\Models\Category;
use App\Models\Country;
use App\Models\Family;
use App\Models\Pet;




use App\Repositories\SeoRepository;

trait HasSeo
{
    public function getSeo()
    {
        if (str_contains($this->seoTag, 'inlineSeo')) {
            $postType = explode(",", $this->seoTag);
            if ($postType[1] == 'breeds') {

                $seo = Breed::where('slug', $postType[2])->first();
                $seo->heading = $seo->title;
            } else if ($postType[1] == 'pets') {
                $seo = Pet::where('slug', $postType[2])->first();
                $seo->heading = $seo->title;
            } else if ($postType[1] == 'categories') {
                $seo = Category::where('slug', $postType[2])->first();
                $seo->heading = $seo->title;
            } else if ($postType[1] == 'countries') {
                $seo = Country::where('id', $postType[2])->first();
                $seo->heading = $seo->title;
            } else if ($postType[1] == 'families') {
                $seo = Family::where('id', $postType[2])->first();
                $seo->heading = $seo->title;
            } else if ($postType[1] == 'blogs') {
                $seo = Blog::where('slug', $postType[2])->first();
                $seo->heading = $seo->title;
            }

            if ($seo) {

                $this->seo()->metatags()
                    ->setTitle($seo->seo_title)
                    ->setDescription($seo->description)
                    ->setKeywords(str($seo->title))
                    ->setCanonical(url()->current());


                $this->seo()->jsonLdMulti()
                    ->setType('Article')
                    ->addImage($seo->getFirstMediaUrl('photo', 'thumb'));
                if (!empty($this->seo()->jsonLdMulti())) {
                    $this->seo()->jsonLdMulti()->newJsonLd()
                        ->setType('WebPage')
                        ->addImage($seo->getFirstMediaUrl('photo', 'thumb'));
                }
                $this->seo()->opengraph()
                    ->setTitle($seo->title)
                    ->setDescription($seo->description)
                    ->setUrl(url()->current())
                    ->addProperty('type', 'articles')
                    ->addImage($seo->getFirstMediaUrl('photo', 'thumb'))
                    ->setSiteName(config('app.name'));
            }
        } else {

            $seo = (new SeoRepository)->getSeoPage($this->seoTag);

            if ($seo) {

                $this->seo()->metatags()
                    ->setTitle($seo->title)
                    ->setDescription($seo->description)
                    ->setKeywords(str($seo->keywords)->explode(',')->toArray())
                    ->setCanonical(url()->current());


                $this->seo()->jsonLdMulti()
                    ->setType('Article')
                    ->addImage($seo->image);
                if (!empty($this->seo()->jsonLdMulti())) {
                    $this->seo()->jsonLdMulti()->newJsonLd()
                        ->setType('WebPage')
                        ->addImage($seo->image);
                }

                $this->seo()->opengraph()
                    ->setTitle($seo->title)
                    ->setDescription($seo->description)
                    ->setUrl(url()->current())
                    ->addImage($seo->image)
                    ->addProperty('type', 'articles')
                    ->setSiteName(config('app.name'));
            }
        }

        view()->share('seo', $seo);
    }
}
