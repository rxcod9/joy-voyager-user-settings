<?php

namespace Joy\VoyagerUserSettings\Policies;

use TCG\Voyager\Contracts\User;
use TCG\Voyager\Policies\BasePolicy;

class UserSettingPolicy extends BasePolicy
{
    /**
     * Determine if the given user can browse the model.
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param                             $model
     *
     * @return bool
     */
    public function browse(User $user, $model)
    {
        return $user->hasPermission('browse_user_settings');
    }

    /**
     * Determine if the given model can be viewed by the user.
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param                             $model
     *
     * @return bool
     */
    public function read(User $user, $model)
    {
        return $user->hasPermission('read_user_settings');
    }

    /**
     * Determine if the given model can be edited by the user.
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param                             $model
     *
     * @return bool
     */
    public function edit(User $user, $model)
    {
        return $user->hasPermission('edit_user_settings');
    }

    /**
     * Determine if the given user can create the model.
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param                             $model
     *
     * @return bool
     */
    public function add(User $user, $model)
    {
        return $user->hasPermission('add_user_settings');
    }

    /**
     * Determine if the given model can be deleted by the user.
     *
     * @param \TCG\Voyager\Contracts\User $user
     * @param                             $model
     *
     * @return bool
     */
    public function delete(User $user, $model)
    {
        return $user->hasPermission('delete_user_settings');
    }
}
