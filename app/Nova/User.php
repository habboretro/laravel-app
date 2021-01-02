<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsTo;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\User::class;

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
        'id', 'name', 'email',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Username')
                ->sortable()
                ->rules('required', 'alpha_dash', 'max:254')
                ->creationRules('unique:users,username')
                ->updateRules('unique:users,username,{{resourceId}}'),

            Text::make('Email', 'mail')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,mail')
                ->updateRules('unique:users,mail,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            DateTime::make('Date Created', 'account_created'),

            DateTime::make('Last Login', 'last_login'),

            Text::make('Motto'),

            Text::make('Look'),

            Select::make('Gender')
                ->options(['M', 'F']),

            // BelongsTo::make('Rank', 'id', Permission::class),

            Number::make('Credits'),

            Boolean::make('Online'),

            Text::make('Ip Register'),

            Text::make('Machine Id'),

            // BelongsTo::make('Home Room', 'id', Room::class),

            Number::make('Balance'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
