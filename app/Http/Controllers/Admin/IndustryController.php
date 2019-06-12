<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\IndustryResource;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|unique:levels,name'
    	]);

    	Industry::create(['name' => $request->title]);

    	return IndustryResource::collection(
    		Industry::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return IndustryResource::collection(Industry::get());
    }
}
