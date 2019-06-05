<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
    		'price' => 'required',
    		'post' => 'required',
    	]);

    	return $request->user();
    }
}
