<?php

namespace App\Policies;

use App\Model\admin\admin;
use App\Model\user\post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function view(admin $user)
    {

    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function create(admin $user)
    {
        return $this->getPermission($user, 9);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user, 10);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermission($user, 11);
    }

    public function tag(admin $user)
    {
        return $this->getPermission($user, 12);
    }

    public function category(admin $user)
    {
        return $this->getPermission($user, 15);
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function restore(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function forceDelete(admin $user)
    {
        //
    }

    protected function getPermission(admin $user, $p_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $p_id) {
                    return true;
                }
            }
        }
        return false;
    }
}
