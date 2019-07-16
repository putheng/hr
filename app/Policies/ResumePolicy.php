<?php

namespace App\Policies;

use App\Models\Resume;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResumePolicy
{
    use HandlesAuthorization;

    public function view(?User $user, Resume $resume)
    {
        if($user->id === $resume->user_id){
            return true;
        }

        if($user->resumes->contains($resume->id)){
            return true;
        }

        if($user->hasRole('admin')){
            return true;
        }

        return false;
    }

    public function nview(?User $user, Resume $resume)
    {
        if($user->id !== $resume->user_id){
            return true;
        }

        return false;
    }
}
