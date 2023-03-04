<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Category;
use App\Models\Food;
use App\Models\FoodType;
use App\Models\Recipe;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\FoodPolicy;
use App\Policies\FoodTypePolicy;
use App\Policies\RecipePolicy;
use App\Policies\UserPolicy;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Category::class => CategoryPolicy::class,
        Recipe::class => RecipePolicy::class,
        Food::class => FoodPolicy::class,
        FoodType::class => FoodTypePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('administrator', [UserPolicy::class, 'admin']);

        //
    }
}
