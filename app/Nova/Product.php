<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Froala\NovaFroalaField\Froala;
use Laravel\Nova\Http\Requests\NovaRequest;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Product::class;

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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $types = [0 => 'Duckets', 5 => 'Diamonds', 'vip' => 'VIP', 'diamond_vip' => 'Diamond VIP', 4 => 'Tokens',];

        return [
            ID::make()->sortable(),

            Number::make('Price')
                ->rules('required'),

            Number::make('Previous Price', 'previous_price'),

            Text::make('Category')
                ->rules('required'),

            Text::make('Type', 'type', fn () => $types[$this->type])
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Select::make('Type')
                ->onlyOnForms()
                ->rules('required')
                ->options($types),

            Number::make('Reward or Rank', 'reward')
                ->rules('required')
                ->default(1),

            Number::make('Previous Reward', 'previous_reward'),

            Froala::make('Description'),

            Boolean::make('Recommended')
                ->rules('required'),
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
