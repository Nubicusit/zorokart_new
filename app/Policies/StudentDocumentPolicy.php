<?php

namespace App\Policies;

use App\Models\StudentDocument;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentDocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, StudentDocument $studentDocument)
    {
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, StudentDocument $studentDocument, User $student)
    {
        $applications = $student->applications;

        if ($user->hasRole('application-advisor') &&
            !is_null($applications->where('advisor_id', $user->id)->first())) {
            return true;
        }

        if ($user->hasRole('admission-department') &&
            !is_null($applications->where('admission_staff_id', $user->id)->first())) {
            return true;
        }

        if ($user->hasRole('visa-department') &&
            !is_null($applications->where('visa_staff_id', $user->id)->first())) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, StudentDocument $studentDocument)
    {
        if ($studentDocument->status != StudentDocument::SUBMITTED) {
            return false;
        }

        $student = $studentDocument->user;
        $applications = $student->applications;

        if ($user->hasRole('application-advisor') &&
            !is_null($applications->where('advisor_id', $user->id)->first())) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, StudentDocument $studentDocument)
    {
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, StudentDocument $studentDocument)
    {
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, StudentDocument $studentDocument)
    {
    }
}
