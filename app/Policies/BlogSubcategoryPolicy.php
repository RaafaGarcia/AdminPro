<?php

namespace App\Policies;

use App\Models\Blog_subcategory;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogSubcategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // dd($user->hasPermition('users'));
        if ($user->hasRole("devs")) {
            return true;
        }

        $role_permitions = $user->hasPermition('blog_subcategories');

        if ($role_permitions) {
            if ($role_permitions->read) {
                return true;
            }
        }

        return false;

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function view(User $user, Blog_subcategory $blog_subcategory)
    {
        if ($user->hasRole("devs")) {
            return true;
        }

        $role_permitions = $user->hasPermition('blog_subcategories');

        if ($role_permitions) {
            if ($role_permitions->read) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasRole("devs")) {
            return true;
        }

        $role_permitions = $user->hasPermition('blog_subcategories');

        if ($role_permitions) {
            if ($role_permitions->create) {
                return true;
            }
        }

        return false;
    }
   

    
    public function update(User $user, Blog_subcategory $blog_subcategory)
    {
       
        
        if ($user->hasRole("devs")) {
            return true;
        }

        $role_permitions = $user->hasPermition('blog_subcategories');

        if ($role_permitions) {

            if ($role_permitions->update) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function delete(User $user, Blog_subcategory $blog_subcategory)
    {
        if ($user->hasRole("devs")) {
            return true;
        }

        $role_permitions = $user->hasPermition('blog_subcategories');

        if ($role_permitions) {
            if ($role_permitions->delete) {
                return true;
            }
        }

        return false;
    }

  
  

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function restore(User $user, blog_subcategory $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, blog_subcategory $model)
    {
        //
    }
}
