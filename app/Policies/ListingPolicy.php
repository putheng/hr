<?php

namespace App\Policies;

use App\Models\Listing;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingPolicy
{
    use HandlesAuthorization;

    public function favorite(?User $user, Listing $listing)
    {
        if($user->favorite->contains($listing->id)){
            return false;
        }

        return true;
    }

    public function not_favorite(?User $user, Listing $listing)
    {
        if($user->favorite->contains($listing->id)){
            return true;
        }

        return false;
    }
}
