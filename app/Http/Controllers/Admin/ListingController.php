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
    		Listing::latest()->paginate(15)
    	);
    }

    public function publish(Request $request)
    {
    	return ListingResource::collection(
    		Listing::latest()->isLive()->isNotExpired()->paginate(15)
    	);
    }

    public function unpublish(Request $request)
    {
    	return ListingResource::collection(
    		Listing::latest()->isNotLive()->paginate(15)
    	);
    }

    public function expired(Request $request)
    {
        return ListingResource::collection(
            Listing::latest()->isExpired()->paginate(15)
        );
    }
}
