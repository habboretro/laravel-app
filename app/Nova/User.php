<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Illuminate\Support\Carbon;
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
    public static $title = 'username';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'username', 'mail',
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

            BelongsTo::make('Rank', 'permissions', Permission::class)
                ->rules('required'),

            Number::make('Credits')
                ->rules('required')
                ->default(config('habbo.default.credits')),

            Number::make('Balance')
                ->rules('required')
                ->default(0),

            Text::make('Motto')
                ->hideFromIndex()
                ->default(config('habbo.default.motto'))
                ->rules('required'),

            Text::make('Look')
                ->hideFromIndex()
                ->default(config('habbo.default.look')),

            Text::make('Referral Code')
                ->hideFromIndex()
                ->rules('required'),

            // BelongsTo::make('Home Room', 'id', Room::class),

            Boolean::make('Online')
                ->rules('required')
                ->trueValue('1')
                ->falseValue('0'),

            Text::make('Ip Register')
                ->rules('required')
                ->hideFromIndex()
                ->default('127.0.0.1'),

            Text::make('Ip Current')
                ->rules('required')
                ->hideFromIndex()
                ->default('127.0.0.1'),

            Text::make('Machine Id')
                ->rules('required')
                ->hideFromIndex()
                ->default('-'),

            Text::make('Date Created', 'account_created')
                ->hideFromIndex()
                ->default(Carbon::now()->timestamp),

            Text::make('Last Login')
                ->hideFromIndex()
                ->default(Carbon::now()->timestamp),
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
