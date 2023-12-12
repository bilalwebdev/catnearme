<?php

namespace App\Nova;

use App\Nova\Actions\Contact\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContactForm extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ContactForm>
     */
    public static $model = \App\Models\ContactForm::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

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
            Text::make(__('Subject')),
            Text::make(__('Email')),
            Textarea::make(__('Message')),
            Badge::make(__('Status'))->map([
                'sent'         => 'info',
                'answered'     => 'success',
                'not_answered' => 'danger'
            ])->labels([
                'sent'         => 'Sent by client',
                'answered'     => 'Answered',
                'not_answered' => 'Not Answered'
            ]),

            Select::make(__('Change Status') , 'status')->options([
                'sent'         => 'Sent by client',
                'answered'     => 'Answered',
                'not_answered' => 'Not Answered'
            ])->displayUsingLabels()->default('answered')->onlyOnForms()
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
        return [
            (new Answer)->showInline()->canSee(function ($req) {

                $status = $this->resource->status;

                if (in_array($status , ['answered' , 'not_answered'])) {
                    return false;
                }

                return true;
            })
                ->confirmText("Here you can reply to a user's message and it will come to their inbox")
                ->confirmButtonText('Send reply')
                ->cancelButtonText("Cancel"),
        ];
    }
}
