<?php

namespace App\Policies;

use App\Models\Song;
use App\Models\User;
use App\Models\Client;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class SongsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Client $client): bool
    {
    }


    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Song $song): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Song $song, $id): bool
    {
        if(!Empty($user->clients->find($id)->id))
            return $user->clients->find($id)->id === $song->client()->get()->skip(1)->first()->id;
        else
            return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Song $song, $id): bool
    {
        if(!Empty($user->clients->find($id)->id))
            return $user->clients->find($id)->id === $song->client()->get()->skip(1)->first()->id;
        else
            return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Song $song): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Song $song): bool
    {
        //
    }
}
