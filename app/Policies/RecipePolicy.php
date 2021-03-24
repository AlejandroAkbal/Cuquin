<?php

namespace App\Policies;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecipePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Recipe $recipe
     * @return mixed
     */
    public function update(User $user, Recipe $recipe)
    {
        return $recipe->author()->is($user);
    }

}
