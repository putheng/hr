<?php

namespace App\Http\View\Composers;

use App\Models\Listing;
use Illuminate\View\View;

class HomeListing
{
    public function compose(View $view)
    {
        $view->with('listings', Listing::with('location', 'company')->isLive()->orderBy('id', 'desc')->limit(15)->get());
    }
}