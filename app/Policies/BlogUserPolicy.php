<?php

namespace App\Policies;

use App\Models\Blog_user;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogUserPolicy
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

        $role_permitions = $user->hasPermition('blog_users');

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
    public function view(User $user, Blog_user $blog_users)
    {
        if ($user->hasRole("devs")) {
            return true;
        }

        $role_permitions = $user->hasPermition('blog_users');

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

        $role_permitions = $user->hasPermition('blog_users');

        if ($role_permitions) {
            if ($role_permitions->create) {
                return true;
            }
        }

        return false;
    }
   

    
    public function update(User $user, Blog_user $blog_users)
    {
       
        
        if ($user->hasRole("devs")) {
            return true;
        }

        $role_permitions = $user->hasPermition('blog_users');

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
    public function delete(User $user, Blog_user $blog_users)
    {
        if ($user->hasRole("devs")) {
            return true;
        }

        $role_permitions = $user->hasPermition('blog_users');

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
    public function restore(User $user, Blog_user $blog_users)
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
    public function forceDelete(User $user, Blog_user $blog_users)
    {
        //
    }
}
