<?php

namespace App\Http\View\Composers;

use App\Models\Listing;
use Illuminate\View\View;

class HomeListing
{
    public function compose(View $view)
    {
        $view->with('listings', Listing::isLive()->orderBy('id', 'desc')->limit(15)->get());

        $view->with('urgents', Listing::isLive()->orderBy('id', 'desc')->limit(5)->get());
    }
}