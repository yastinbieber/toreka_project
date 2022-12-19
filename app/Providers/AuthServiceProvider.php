<?php

namespace App\Providers;

use App\Models\IdealWeight;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        TrRecord::class => TrRecordPolicy::class,
        IdealWeight::class => IdealWeightPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    // Policyを使用するから不要?
    // public function boot()
    // {
    //     $this->registerPolicies();

    //     Gate::define('update-post', [TrRecordPolicy::class, 'update']);
    // }
}
