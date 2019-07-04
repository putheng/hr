<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function destroy(Request $request)
    {
        Education::find($request->id)->delete();

        return EducationResource::collection(
             Education::latest()->get()
        );
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|unique:education,name'
    	]);

    	Education::create(['name' => $request->title]);

    	return EducationResource::collection(
    		 Education::latest()->get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return EducationResource::collection(
             Education::latest()->get()
        );
    }
    
    public function edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:company_types,name'
        ]);

        Education::find($request->id)->update($request->only('name'));

        return EducationResource::collection(
            Education::latest()->get()
        )->additional([
            'success' => true
        ]);
    }
}
