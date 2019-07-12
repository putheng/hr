<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function get(Request $request)
    {
    	return CompanyResource::collection(
    		Company::latest()->get()
    	);
    }

    public function featured(Request $request)
    {
        Company::find($request->id)->update(['featured' => true]);

        return CompanyResource::collection(
        	Company::isFeatured()->latest()->get()
       	);
    }

    public function removeFeatured(Request $request)
    {
        Company::find($request->id)->update(['featured' => false]);

        return CompanyResource::collection(
            Company::isFeatured()->latest()->get()
        );
    }

    public function storeBlocked(Request $request)
    {
        Company::find($request->id)->update(['blocked' => true]);

        return CompanyResource::collection(
           Company::isNotBlocked()->latest()->get()
        );
    }

    public function unblock(Request $request)
    {
        Company::find($request->id)->update(['blocked' => false]);

        return CompanyResource::collection(
            Company::isBlocked()->latest()->get()
        );
    }

    public function getFeatured(Request $request)
    {
        return CompanyResource::collection(
            Company::isFeatured()->isNotBlocked()->latest()->get()
        );
    }

    public function blocked(Request $request)
    {
        return CompanyResource::collection(
            Company::isBlocked()->latest()->get()
        );
    }
}
