<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Song;
use App\Models\User;
use App\Models\Client;
use App\Policies\SongsPolicy;
use App\Policies\ClientsPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Validation\Rules\Exists;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Client::class => ClientsPolicy::class,
        Song::class => SongsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('ver-canciones-edit', function (User $user, Client $client) {
            return $user->id === $client->user_id
                ? Response::allow()
                : Response::deny('No puedes ver este usuario...');
        });

        Gate::define('ver-canciones-delete', function (User $user, Client $client) {
            return $user->id === $client->user_id
                ? Response::allow()
                : Response::deny('No puedes ver este usuario...');
        });

        Gate::define('misCanciones', function (User $user, Client $client) {
            return $user->id === $client->user_id
                ? Response::allow()
                : Response::deny('No puedes ver este usuario...');
        });

        Gate::define('opcionesCanciones', function (User $user, Client $client) {
            return $user->id === $client->user_id
                ? Response::allow()
                : Response::deny('No puedes ver este usuario...');
        });

        Gate::define('formCreate', function (User $user, Client $client) {
            return $user->id === $client->user_id
                ? Response::allow()
                : Response::deny('No puedes ver este usuario...');
        });

        Gate::define('formEdit', function (User $user, Client $client) {
            return $user->id === $client->user_id
                ? Response::allow()
                : Response::deny('No puedes ver este usuario...');
        });
    }
}
