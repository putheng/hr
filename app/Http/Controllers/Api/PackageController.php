<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyPackageResources;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function buy(Request $request)
    {
    	$id = $request->id;
    	$price = $request->price;
        $user = $request->user();

    	$usd = $user->usd;

    	if($usd < $price){
    		return response()->json([
    			'message' => 'Sorry, your balance is not enough to complete this transaction!',
    			'id' => $id,
    			'price' => $price,
    		], 402);
    	}

        $package = Package::find($id);
        
        $user->packages()->attach($package);

        $user->decrement('usd', $price);

        return response()->json([
            'success' => true,
        ]);
    }

    public function my(Request $request)
    {
        return MyPackageResources::collection(
            $request->user()->packages()->orderBy('package_user.id', 'desc')->get()
        );
    }
}
