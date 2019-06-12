<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingFirstStep;
use App\Http\Requests\StoreListingFromRequest;
use App\Http\Requests\StoreListingSecondStep;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function store(StoreListingFromRequest $request)
    {
    	
    }

    public function firstStep(StoreListingFirstStep $request)
    {

    }

    public function secondStep(StoreListingSecondStep $request)
    {
    	
    }
}
