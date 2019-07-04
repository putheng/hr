<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();

        return CategoryResource::collection(
            Category::latest()->get()
        );
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'category' => 'required|unique:categories,name'
    	]);

    	Category::create(['name' => $request->category]);

    	return CategoryResource::collection(
    		Category::latest()->get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return CategoryResource::collection(
            Category::latest()->get()
        );
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:company_types,name'
        ]);

        Category::find($request->id)->update($request->only('name'));

        return CategoryResource::collection(
            Category::latest()->get()
        )->additional([
            'success' => true
        ]);
    }
}
