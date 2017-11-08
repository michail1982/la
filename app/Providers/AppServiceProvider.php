<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\EntityType;
use App\Observers\EntityTypeObserver;
use App\Models\Entity;
use App\Observers\EntityObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Entity::observe(EntityObserver::class);
        EntityType::observe(EntityTypeObserver::class);
        //User::observe(UserObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
