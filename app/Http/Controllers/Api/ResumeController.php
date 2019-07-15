<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ResumeResource;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function show()
    {
    	return ResumeResource::collection(
    		Resume::with('user')->cv()->latest()->get()
    	);
    }

    public function my(Request $request)
    {
    	return ResumeResource::collection(
    		$request->user()->resumes()->cv()->latest()->get()
    	);
    }

    public function purchase(Request $request)
    {
    	$resume = Resume::find($request->id);

    	$resume->users()->sync($request->user());

    	return ResumeResource::collection(
    		Resume::with('user')->cv()->latest()->get()
    	);
    }
}
