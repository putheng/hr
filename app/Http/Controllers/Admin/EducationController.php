<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|unique:education,name'
    	]);

    	Education::create(['name' => $request->title]);

    	return EducationResource::collection(
    		Education::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return EducationResource::collection(Education::get());
    }
}
