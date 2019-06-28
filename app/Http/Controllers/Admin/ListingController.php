<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ListingResource;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function all(Request $request)
    {
    	return ListingResource::collection(
    		Listing::with('location', 'category', 'company')->latest()->paginate(15)
    	);
    }

    public function publish(Request $request)
    {
    	return ListingResource::collection(
    		Listing::with('location', 'category', 'company')->latest()->isLive()->isNotExpired()->paginate(15)
    	);
    }

    public function unpublish(Request $request)
    {
    	return ListingResource::collection(
    		Listing::with('location', 'category', 'company')->latest()->isNotLive()->paginate(15)
    	);
    }

    public function expired(Request $request)
    {
        return ListingResource::collection(
            Listing::with('location', 'category', 'company')->latest()->isExpired()->paginate(15)
        );
    }
}
