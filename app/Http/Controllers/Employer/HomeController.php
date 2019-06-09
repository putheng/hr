<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	return view('layouts.employer');
    }

    public function profile(Request $request)
    {
    	return new UserResource($request->user());
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3|max:255',
    		'email' => 'required|email|unique:users,email,'. auth()->id(),
    	]);

    	$request->user()->update($request->only('name', 'email'));

        return (new UserResource($request->user()))
            ->additional([
                'success' => true,
                'type' => 'updateUser',
                'message' => 'Profile was updated successfully'
            ]);
    }
}
