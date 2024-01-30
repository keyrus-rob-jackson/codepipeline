<?php

namespace App\Providers;

use App\Models\Role;
use App\Nova\Client;
use App\Nova\Project;
use App\Nova\Sensor;
use App\Nova\Structure;
use App\Nova\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::withBreadcrumbs();

        Nova::footer(function ($request) {
            return Blade::render('');
        });

        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::make('Clients')
                    ->resource(Client::class)
                    ->icon('identification'),

                MenuSection::make('Users')
                    ->resource(User::class)
                    ->icon('user-group'),

                MenuSection::make('Projects')
                    ->resource(Project::class)
                    ->icon('chart-pie'),

                MenuSection::make('Structures')
                    ->resource(Structure::class)
                    ->icon('finger-print'),

                MenuSection::make('Sensors')
                    ->resource(Sensor::class)
                    ->icon('qrcode'),
            ];
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return $user->hasRole(Role::ROLE_SUPER_ADMIN);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Nova::$initialPath = '/resources/clients';

        Nova::sortResourcesBy(function ($resource) {
            return $resource::$priority ?? 99999;
        });
    }
}
