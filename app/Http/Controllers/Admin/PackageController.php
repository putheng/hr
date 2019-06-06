<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageFormRequest;
use App\Http\Resources\PackageResources;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function all(Request $request)
    {
        return PackageResources::collection(Package::orderBy('id', 'desc')->get());
    }

    public function update(Request $request, Package $package)
    {
        $this->validate($request, [
            'title' => 'required',
            'cv' => 'required',
            'price' => 'required',
            'post' => 'required',
            'days' => 'required',
        ]);

        $package->title = $request->title;
        $package->post = $request->post;
        $package->cv = $request->cv;
        $package->price = $request->price;
        $package->days = $request->days;
        $package->save();
        
        return (new PackageResources($package))
            ->additional([
                'success' => true
            ]);
    }

    public function get(Request $request, Package $package)
    {
        return (new PackageResources($package));
    }

    public function store(PackageFormRequest $request)
    {
    	$package = new Package;

    	$package->title = $request->title;
    	$package->post = $request->post;
    	$package->cv = $request->cv;
    	$package->price = $request->price;
    	$package->days = $request->days;
    	$package->user()->associate($request->user());
    	$package->save();

    	return response()->json([
    		'success' => true,
    	]);
    }
}
