<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyTypeResource;
use App\Models\CompanyType;
use Illuminate\Http\Request;

class CompanyTypeController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'type' => 'required|unique:company_types,name'
    	]);

    	CompanyType::create(['name' => $request->type]);

    	return CompanyTypeResource::collection(
    		CompanyType::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return CompanyTypeResource::collection(CompanyType::get());
    }
}
