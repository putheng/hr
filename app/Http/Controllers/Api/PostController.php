<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Http\Resources\Api\PageResource;
use App\Http\Resources\Api\PageTypeResource;
use App\Models\Page;
use App\Models\PageType;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function type()
    {
    	return PageTypeResource::collection(
    		PageType::get()
    	)->additional([
    		'success' => true,
    	]);
    }

    public function show(Request $request)
    {
    	return PageResource::collection(
    		Page::orderBy('id', 'desc')->get()
    	)->additional([
    		'success' => true,
    	]);
    }

    public function store(PageRequest $request)
    {
    	$page = new Page;

    	$where = Page::where('type', $request->type);

    	if($where->count()){
    		$page = $where->first();
    	}

    	$page->title = $request->title;
    	$page->content = $request->content;
    	$page->type = $request->type;
    	$page->user()->associate(auth()->user());

    	$page->save();

    	return PageResource::collection(
    		Page::orderBy('id', 'desc')->get()
    	)->additional([
    		'success' => true,
    		'message' => 'Success'
    	]);
    }

    public function destroy(Request $request)
    {
        Page::find($request->id)->delete();

        return PageResource::collection(
             Page::latest()->get()
        );
    }
}
