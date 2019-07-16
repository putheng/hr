<?php

namespace App\Http\View\Composers;

use App\Models\Listing;
use App\Models\Urgent;
use Illuminate\View\View;

class UrgentJob
{
    public function compose(View $view)
    {
    	$urgents = Urgent::isLive()->get()->pluck('listing_id')->toArray();

    	$listings = Listing::whereIn('id', $urgents)->with('location', 'company')
    			->isLive()->orderBy('id', 'desc')->limit(5)->get();

        $view->with('urgents', $listings);
    }
}