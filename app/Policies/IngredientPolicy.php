<?php

namespace App\Policies;

use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IngredientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Ingredient $ingredient
     * @return mixed
     */
    public function update(User $user, Ingredient $ingredient)
    {
        return $ingredient->creator()->is($user);
    }

}
