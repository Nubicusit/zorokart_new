<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function createAdminUser(User $user)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }

        return $user->can('users.admin.create');
    }

    public function viewUser(User $user)
    {
        if ($user->hasRole('chief-operating-officer')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if ($user->hasRole(['super-admin'])) {
            return true;
        }
    }

    public function viewStaff(User $user)
    {
        if ($user->hasRole(['chief-operating-officer'])) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $student)
    {
        if ($user->hasRole(['super-admin', 'chief-operating-officer'])) {
            return true;
        }

        $enquiries = $student->enquiries;

        if ($user->hasRole('counsellor') &&
            !is_null($enquiries->where('counsellor_id', $user->id)->first())) {
            return true;
        }

        $applications = $student->applications;

        if ($user->hasRole('admission-department') &&
            !is_null($applications->where('admission_staff_id', $user->id)->first())) {
            return true;
        }

        if ($user->hasRole('application-advisor') &&
            !is_null($applications->where('advisor_id', $user->id)->first())) {
            return true;
        }

        if ($user->hasRole('visa-department') &&
            !is_null($applications->where('visa_staff_id', $user->id)->first())) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->hasRole(['admin'])) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        if ($user->hasRole(['super-admin', 'chief-operating-officer'])) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        if ($user->hasRole(['super-admin', 'chief-operating-officer'])) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
    }
}
