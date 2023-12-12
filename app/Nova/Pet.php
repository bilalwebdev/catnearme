<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Pet extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Pet>
     */
    public static $model = \App\Models\Pet::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id' ,
        'title' ,
        'description' ,
        'full_Description' ,
        'age' ,
        'gender' ,
        'keywords' ,
        'pt',
        'price',
        'price_breeding',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make(__('Title'))->sortable(),
            Textarea::make(__('Description')),
            Textarea::make(__('Full Description')),
            BelongsTo::make(__('Breed') , 'breed'),
            BelongsTo::make(__('Breeder') , 'user' , User::class),
            Text::make(__('Age'))->hideFromIndex(),
            Text::make(__('Gender'))->hideFromIndex(),
            Text::make(__('Keywords'))->hideFromIndex(),
            Select::make('Status')->options([
                'active'     => 'Active',
                'not_active' => 'Not Active'
            ])->displayUsingLabels()->default('active'),
            Text::make(__('Personality Traits') , 'pt')->hideFromIndex(),
            Boolean::make(__('Champion Bloodlines') , 'cb')->hideFromIndex(),
            Boolean::make(__('Pedigree') , 'pedigree')->hideFromIndex(),
            Boolean::make(__('Neutered/Spayed?') , 'ns')->hideFromIndex(),

            Text::make(__('Price'), function () {
                return '$ ' . $this->price;
            }),
            Text::make(__('Price Breeding'), function () {
                return '$ ' . $this->price_breeding;
            }),

            HasOne::make(__('Shipping') , 'shipping'),
            HasOne::make(__('Vactination') , 'vactinations'),
            HasOne::make(__('Certification') , 'certifications'),
            HasMany::make(__('Family') , 'family'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
