<?php

namespace App\Http\View\Composers;

use App\Models\Listing;
use Illuminate\View\View;

class UrgentJob
{
    public function compose(View $view)
    {
        $view->with('urgents', Listing::with('location', 'company')->isLive()->orderBy('id', 'desc')->limit(5)->get());
    }
}