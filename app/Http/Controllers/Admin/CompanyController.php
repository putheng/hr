<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function all()
    {
    	return CompanyResource::collection(
    		Company::latest()->isNotBlocked()->get()
    	);
    }
}
