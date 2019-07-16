<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\FileUpload;
use App\Http\Resources\Api\AdvertisingResource;
use App\Models\Advertising;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
	protected $upload;

	public function __construct(FileUpload $fileUpload)
	{
		$this->upload = $fileUpload;
	}

    public function upload(Request $request)
    {
    	$this->validate($request, [
    		'area' => 'required',
    		'image' => 'required',
    	]);

    	$file = $this->upload->upload($request->file('image'));

    	$ads = new Advertising;
    	$ads->area = $request->area;
    	$ads->live = 1;
    	$ads->link = $request->url;
    	$ads->file()->associate($file);
    	$ads->user()->associate(auth()->user());
    	$ads->save();

    	return AdvertisingResource::collection(
            Advertising::latest()->get()
        )
    		->additional(['success' => true]);
    }

    public function show(Request $request)
    {
    	return AdvertisingResource::collection(Advertising::latest()->get())
    		->additional(['success' => true]);
    }

    public function desroy(Request $request)
    {
    	Advertising::find($request->id)->delete();

    	return AdvertisingResource::collection(Advertising::latest()->get())
    		->additional(['success' => true]);
    }
}
