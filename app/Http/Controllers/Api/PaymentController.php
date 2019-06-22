<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepositResource;
use App\Http\Resources\PaymentGatewayResource;
use App\Models\Deposit;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show()
    {
    	return PaymentGatewayResource::collection(
    		PaymentGateway::isEnable()->get()
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

    public function deposit(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:payment_gateways,id',
            'amount' => 'required|numeric',
            'code' => 'required'
        ]);

        $deposit = new Deposit;

        $deposit->gateway_id = $request->id;
        $deposit->amount = $request->amount;
        $deposit->transaction = $request->code;

        $deposit->user()->associate($request->user());
        $deposit->save();

        return response()->json([
            'success' => true,
            'message' => 'Thank You for Your payment. The deposit is successfully submit and is now being processed in our system.'
        ]);
    }

    public function transaction(Request $request)
    {
        return DepositResource::collection(
            $request->user()->deposits()
                ->orderBY('id', 'desc')->get()
        );
    }
}
