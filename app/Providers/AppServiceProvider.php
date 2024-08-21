<?php

namespace App\Providers;

use App\Macros\CollectionPaginate;
use App\Models\PersonalAccessToken;
use App\Settings\SiteSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Sanctum::ignoreMigrations();
    }

    public function boot(): void
    {
        URL::forceScheme(config('app.use_https') ? 'https' : 'http');

        Model::preventLazyLoading(App::isLocal());

        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        Collection::macro('paginate', app(CollectionPaginate::class)());

        Relation::enforceMorphMap(array_flip(config('base.model_names')));

        Paginator::useBootstrapFour();

        View::share('siteSetting', app(SiteSetting::class));
    }
}
