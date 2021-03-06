<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Observers\UserObserver;
use App\Models\Patient;
use App\Observers\PatientObserver;
use App\Models\BPReading;
use App\Observers\BPReadingObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        User::observe(UserObserver::class);
        Patient::observe(PatientObserver::class);
        BPReading::observe(BPReadingObserver::class);
    }
}
