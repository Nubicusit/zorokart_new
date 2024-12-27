<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if ($user->hasRole(['super-admin',
            'counsellor',
            'chief-operating-officer',
            'application-advisor',
            'admission-department',
            'visa-department',
            'front-office-staff', ])) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Application $application)
    {
        if ($user->hasRole('student')) {
            return $application->student_id === $user->id;
        }

        if ($user->hasRole('counsellor')) {
            return $application->counsellor->id == $user->id;
        }

        if ($user->hasRole('application-advisor')) {
            return $application->advisor_id === $user->id;
        }

        if ($user->hasRole('admission-department')) {
            return $application->admission_staff_id == $user->id;
        }

        if ($user->hasRole('visa-department')) {
            return $application->visa_staff_id == $user->id;
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
        if ($user->hasRole(['super-admin',
            'counsellor',
            'chief-operating-officer',
            'application-advisor',
             ])) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Application $application)
    {
        if ($user->hasRole('student')) {
            return $application->student_id === $user->id;
        }

        if ($user->hasRole('counsellor')) {
            return $application->counsellor->id == $user->id;
        }

        if ($user->hasRole('application-advisor')) {
            return $application->advisor->id == $user->id;
        }

        if ($user->hasRole('admission-department')) {
            return $application->admission_staff_id === $user->id;
        }

        if ($user->hasRole('visa-department')) {
            return $application->visa_staff_id === $user->id;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Application $application)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Application $application)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Application $application)
    {
        return false;
    }
}
