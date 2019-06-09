<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\LevelResource;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|unique:levels,name'
    	]);

    	Level::create(['name' => $request->title]);

    	return LevelResource::collection(
    		Level::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return LevelResource::collection(Level::get());
    }
}
