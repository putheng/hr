<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingFirstStep;
use App\Http\Requests\StoreListingFromRequest;
use App\Http\Requests\StoreListingSecondStep;
use App\Http\Resources\ListingResource;
use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function store(StoreListingFromRequest $request)
    {
    	$listing = new Listing;

        $listing->title = $request->title;
        $listing->user()->associate($request->user());
        $listing->company_id = $request->user()->company->id;
        $listing->category_id = $request->category;
        $listing->level_id = $request->level;
        $listing->experience_id = $request->experience;
        $listing->salary_id = $request->salary;
        $listing->education_id = $request->education;
        $listing->location_id = $request->location;
        $listing->term_id = $request->term;
        $listing->start = $request->start_date;
        $listing->closing = $request->closing_date;
        $listing->description = $request->description;
        $listing->requirement = $request->requirements;
        $listing->live = 1;
        $listing->expires_at = Carbon::now()->addMonth('1 month');
        $listing->slug = str_slug($request->title) .'-'. str_random(7) .'.html';

        $listing->save();

        \DB::table('listing_package')->insert([
            'listing_id' => $listing->id,
            'package_id' => $request->package,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Listing created successfully'
        ]);
    }

    public function firstStep(StoreListingFirstStep $request)
    {

    }

    public function secondStep(StoreListingSecondStep $request)
    {
    	
    }

    public function publish(Request $request)
    {
        return ListingResource::collection(
            Listing::orderBy('id', 'desc')
            ->where('live', 1)->get()
        );
    }

    public function unpublish(Request $request)
    {
        return ListingResource::collection(
            Listing::orderBy('id', 'desc')
            ->where('live', 0)->get()
        );
    }

    public function expired(Request $request)
    {
        return ListingResource::collection(
            Listing::orderBy('id', 'desc')
            ->whereDate('expires_at', '<=', Carbon::now())->get()
        );
    }
}
