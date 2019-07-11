<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function filter(Request $request)
    {
    	$listings = Listing::filter($request)->paginate(15);

    	return view('home.filter', compact('listings'));
    }

    public function show(Request $request, Listing $listing)
    {
    	return view('home.listing', compact('listing'));
    }

    public function index(Request $request)
    {
    	$listings = Listing::with('company', 'location')->latest()->paginate(20);

    	return view('home.listings', compact('listings'));
    }
}
