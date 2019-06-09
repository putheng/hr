<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|unique:experiences,name'
    	]);

    	Experience::create(['name' => $request->title]);

    	return ExperienceResource::collection(
    		Experience::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return ExperienceResource::collection(Experience::get());
    }
}
