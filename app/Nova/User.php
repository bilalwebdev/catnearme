<?php

namespace App\Nova;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Ebess\AdvancedNovaMediaLibrary\Fields\Media;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use function Symfony\Component\Translation\t;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'username';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'email' ,
        'username' ,
        'first_name' ,
        'last_name',
        'phone_number' ,
        'address' ,
        'about_me' ,
        'type'
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

            Images::make('Avatar' , 'thumb')
                ->nullable(), // validation rules

            Text::make('Name')
                ->sortable()
                ->nullable('required', 'max:255')->hideFromIndex(),

            Text::make('Username')
                ->nullable('required', 'max:255'),

            Text::make('First Name')
                ->rules('required', 'max:255')->hideFromIndex(),

            Text::make('Last Name')
                ->rules('required', 'max:255')->hideFromIndex(),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}')->hideFromIndex(),

            Text::make('Address')
                ->sortable()
                ->nullable('required', 'max:255')
                ->onlyOnForms(),

            Textarea::make('About Me')
                ->hideFromIndex(),

            BelongsTo::make('Country' , 'country', Country::class),
            BelongsTo::make(__('Plan')),

            Badge::make('Type')->map([
                'breeder' => 'success',
                'client'  => 'info',
            ])->labels([
                'breeder' => 'Breeder',
                'client'  => 'Client',
            ]),

            Select::make('Status')->options([
                'active' => 'Active',
                'not_active' => 'Not Active',
                'suspended' => 'Suspended',
                'locked' => 'Locked',
            ])->displayUsingLabels()->onlyOnForms(),

            Text::make('LatLng', function () {
                return $this->lat . ',' . $this->lng;
            })->hideFromIndex(),

            Boolean::make('Is Verify' , 'is_verify')
                ->trueValue(true)
                ->falseValue(false),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),
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
