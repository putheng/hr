<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function all(Request $request)
    {
    	return new UserResource($request->user());
    }
}
