<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ListingResource;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function favorite(Request $request)
    {
    	return ListingResource::collection(
    		$request->user()->favorite()->with('location', 'category', 'company')->latest()->get()
    	);
    }

    public function remove(Request $request)
    {
    	$request->user()->favorite()->detach($request->id);

    	return ListingResource::collection(
    		$request->user()->favorite()->with('location', 'category', 'company')->latest()->get()
    	);
    }
}
