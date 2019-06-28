<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function destroy(Request $request)
    {
        Location::find($request->id)->delete();

        return LocationResource::collection(Location::orderBy('id', 'desc')->get());
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|unique:locations,name'
    	]);

    	Location::create(['name' => $request->title]);

    	return LocationResource::collection(
    		Location::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return LocationResource::collection(Location::orderBy('id', 'desc')->get());
    }
}
