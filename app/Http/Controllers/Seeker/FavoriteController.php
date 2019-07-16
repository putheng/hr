<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function save(Request $request, Listing $listing)
    {
    	$listing->favorite()->sync($request->user());

    	return back();
    }

    public function remove(Request $request, Listing $listing)
    {
    	$listing->favorite()->detach($request->user());

    	return back();
    }
}
