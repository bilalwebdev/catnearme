<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Family extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Family>
     */
    public static $model = \App\Models\Family::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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
            Text::make(__('Name')),
            Textarea::make(__('Description')),
            Text::make(__('Breed'), 'breed.title'),
            Text::make(__('Age')),
            Text::make(__('Color')),
            Text::make(__('Size'))->hideFromIndex(),
            Text::make(__('Sire'))->hideFromIndex(),
            Text::make(__('Dam'))->hideFromIndex(),
            Text::make(__('Awards'))->hideFromIndex(),
            Text::make(__('Who'), function () {
                return ucfirst($this->type);
            })->hideFromIndex(),
            Text::make(__('Gender'), function () {
                return ucfirst($this->gender);
            })->hideFromIndex(),
            Select::make(__('Type'))->options([
                'parent'  => 'Parent'
            ])->displayUsingLabels()->hideFromIndex(),
            Textarea::make(__('achievements_certificates')),
            BelongsTo::make(__('Breeder') , 'breeder', User::class)->peekable()->searchable(),
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
