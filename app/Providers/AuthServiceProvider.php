<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Category;
use App\Models\Document;
use App\Policies\UserPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\DocumentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //User::class => UserPolicy::class,
        //Document::class => DocumentPolicy::class,
        //Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //$this->registerPolicies();
        //Gate::define('before','App\Policies\UserPolicy@before');
    }
}
