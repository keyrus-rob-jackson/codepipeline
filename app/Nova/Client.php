<?php

namespace App\Nova;

use App\Enums\Countries;
use App\Enums\States;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Client extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Client>
     */
    public static $model = \App\Models\Client::class;

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
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Name'),

            Text::make('Street Number')->hideFromIndex(),

            Text::make('Address 1', 'address1')->hideFromIndex(),

            Text::make('Address 2', 'address2')->hideFromIndex(),

            Text::make('City')->hideFromIndex(),

            Select::make('State')->options(States::all())->hideFromIndex(),

            Text::make('Zip')->hideFromIndex(),

            Select::make('Country')->options(Countries::all())->hideFromIndex(),

            Text::make('Users', function () {
                return $this->users()->count();
            })
                ->onlyOnIndex(),

            Text::make('Projects', function () {
                return $this->projects()->count();
            })
                ->onlyOnIndex(),

            HasMany::make('Users'),

            HasMany::make('Projects'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
