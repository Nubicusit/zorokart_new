<?php

namespace App\Policies;

use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnquiryPolicy
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
    public function view(User $user, Enquiry $enquiry)
    {
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasRole('student');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Enquiry $enquiry)
    {
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Enquiry $enquiry)
    {
        return $user->hasRole('student') &&
            $enquiry->student_id === $user->id;
    }

    public function assignToCounsellor(User $user, Enquiry $enquiry)
    {
        return $user->hasRole('front-office-staff') &&
            $enquiry->status == Enquiry::NEW;
    }
}
