<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\App\Repositories\ListTodo\ListOfTodoListsRepositoryInterface::class, \App\Repositories\ListTodo\ListOfTodoListsRepository::class);
        $this->app->singleton(\App\Repositories\TodoList\TodoListRepositoryInterface::class, \App\Repositories\TodoList\TodoListRepository::class);
        $this->app->singleton(\App\Repositories\User\UserRepositoryInterface::class, \App\Repositories\User\UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
