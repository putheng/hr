<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\SalaryResource;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function destroy(Request $request)
    {
        Salary::find($request->id)->delete();

        return SalaryResource::collection(Salary::orderBy('id', 'desc')->get());
    }
    
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
    	return SalaryResource::collection(Salary::orderBy('id', 'desc')->get());
    }
    
    public function edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:company_types,name'
        ]);

        Salary::find($request->id)->update($request->only('name'));

        return SalaryResource::collection(
            Salary::get()
        )->additional([
            'success' => true
        ]);
    }
}
