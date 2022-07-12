<?php

namespace App\Policies;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('Categorie_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Categorie $categorie)
    {
        return $user->hasPermission('Categorie_view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermission('Categorie_create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Categorie $categorie)
    {
        return $user->hasPermission('Categorie_update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Categorie $categorie)
    {
        return $user->hasPermission('Categorie_delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Categorie $categorie)
    {
        return $user->hasPermission('Categorie_restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Categorie $categorie)
    {
        return $user->hasPermission('Categorie_forceDelete');
    }
}
