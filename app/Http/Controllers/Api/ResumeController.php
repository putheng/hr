<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ResumeResource;
use App\Http\Resources\Admin\SeekerResource;
use App\Models\Resume;
use App\Models\Seeker;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function show()
    {
    	return ResumeResource::collection(
    		Resume::with('user')->cv()->latest()->get()
    	);
    }

    public function seeker()
    {
        return SeekerResource::collection(
            Seeker::orderBy('id', 'desc')->get()
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

    public function adminShow()
    {
        return ResumeResource::collection(
            Resume::with('user')->latest()->get()
        );
    }
}
