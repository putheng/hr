<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function store(StoreCompanyProfileRequest $request)
    {
    	$request->user()->company()->update([
			'name' => $request->name,
			'phone' => $request->phone,
			'email' => $request->email,
			'website' => $request->website,
			'address' => $request->address,
			'description' => $request->about
    	]);

    	return response()->json([
    		'status' => true,
    		'message' => 'Profile updated successfully'
    	]);
    }
}
