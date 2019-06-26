<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seeker\StoreProfileRequest;
use App\Http\Resources\Seeker\UserResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
    	return new UserResource($request->user());
    }

    public function store(StoreProfileRequest $request)
    {
    	$user = $request->user();

    	$user->update($request->only('name', 'email'));

    	$user->seeker()->update([
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'dob' => $request->dob,
			'gender' => $request->gender,
			'marital' => $request->marital,
			'mobile' => $request->phone,
			'nationality' => $request->nationality,
			'address' => $request->address,
    	]);

    	return (new UserResource($user))
    		->additional([
    			'success' => true,
    			'message' => 'Profile updated successfully'
    		]);
    }
}
