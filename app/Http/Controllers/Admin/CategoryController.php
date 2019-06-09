<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'category' => 'required|unique:categories,name'
    	]);

    	Category::create(['name' => $request->category]);

    	return CategoryResource::collection(
    		Category::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return CategoryResource::collection(Category::get());
    }
}
