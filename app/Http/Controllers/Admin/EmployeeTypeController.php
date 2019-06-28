<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeTypeResource;
use App\Models\EmployeeType;
use Illuminate\Http\Request;

class EmployeeTypeController extends Controller
{
    public function destroy(Request $request)
    {
        EmployeeType::find($request->id)->delete();

        return EmployeeTypeResource::collection(EmployeeType::orderBy('id', 'desc')->get());
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|unique:employee_types,name'
    	]);

    	EmployeeType::create(['name' => $request->title]);

    	return EmployeeTypeResource::collection(
    		EmployeeType::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return EmployeeTypeResource::collection(EmployeeType::orderBy('id', 'desc')->get());
    }
}
