<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyTypeResource;
use App\Models\CompanyType;
use Illuminate\Http\Request;

class CompanyTypeController extends Controller
{
    public function destroy(Request $request)
    {
        CompanyType::find($request->id)->delete();

        return CompanyTypeResource::collection(CompanyType::orderBy('id', 'desc')->get());
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'type' => 'required|unique:company_types,name'
    	]);

    	CompanyType::create(['name' => $request->type]);

    	return CompanyTypeResource::collection(
    		CompanyType::latest()->get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return CompanyTypeResource::collection(
            CompanyType::latest()->get()
        );
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:company_types,name'
        ]);

        CompanyType::find($request->id)->update($request->only('name'));

        return CompanyTypeResource::collection(
            CompanyType::latest()->get()
        )->additional([
            'success' => true
        ]);
    }
}
