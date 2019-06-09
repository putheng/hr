<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentGatewayResource;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show()
    {
    	return PaymentGatewayResource::collection(
    		PaymentGateway::get()
    	);
    }

    public function store(Request $request)
    {
    	$id = $request->id;

    	$geteway = PaymentGateway::find($id);

    	$status = $geteway->status == 'enable' ? 'disable' : 'enable'; 

    	$geteway->update(['status' => $status]);

    	return PaymentGatewayResource::collection(
    		PaymentGateway::get()
    	);
    }
}
