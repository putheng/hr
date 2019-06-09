<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\SalaryResource;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|unique:salaries,name'
    	]);

    	Salary::create(['name' => $request->title]);

    	return SalaryResource::collection(
    		Salary::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return SalaryResource::collection(Salary::get());
    }
}
