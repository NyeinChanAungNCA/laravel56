<?php

namespace App\Policies;

use App\User;
use App\Artical;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return bool
     */
    public function update(User $user, Artical $artical)
    {
        return $user->id === $artical->user_id;
    }

    public function destroy(User $user, Artical $artical)
    {
        return $user->id === $artical->user_id;
    }
}
