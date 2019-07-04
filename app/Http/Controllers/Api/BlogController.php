<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|max:255',
    		'content' => 'required',
    	]);

    	$blog = new Blog;
    	$blog->title = $request->title;
    	$blog->content = $request->content;
    	$blog->user()->associate(auth()->user());
    	$blog->save();

    	return BlogResource::collection(
    		Blog::get()
    	)->additional([
    		'success' => true,
    	]);
    }

    public function destroy(Request $request)
    {
    	Blog::find($request->id)->delete();

    	return BlogResource::collection(
    		Blog::get()
    	)->additional([
    		'success' => true,
    	]);
    }

    public function show(Request $request)
    {
    	return BlogResource::collection(
    		Blog::get()
    	);
    }
}
