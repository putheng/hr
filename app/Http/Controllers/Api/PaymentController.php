<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepositResource;
use App\Http\Resources\PaymentGatewayResource;
use App\Http\Resources\UserResource;
use App\Models\Deposit;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function approve(Request $request)
    {
        $deposit = Deposit::find($request->id);

        if($deposit->status == 'accepted'){
            return response()->json([
                'message' => 'This deposit is already accepted!'
            ], 402);
        }

        $deposit->status = 'accepted';
        $deposit->save();

        $deposit->user()->increment('usd', $deposit->amount);

        return DepositResource::collection(
            Deposit::isPending()->orderBY('id', 'desc')->get()
        );
    }

    public function reject(Request $request)
    {
        $deposit = Deposit::find($request->id);

        if($deposit->status == 'rejected'){
            return response()->json([
                'message' => 'This deposit is already rejected!'
            ], 402);
        }

        $deposit->description = $request->description;
        $deposit->status = 'rejected';
        $deposit->save();

        return DepositResource::collection(
            Deposit::isPending()->orderBY('id', 'desc')->get()
        );
    }

    public function show()
    {
    	return PaymentGatewayResource::collection(
    		PaymentGateway::isEnable()->get()
    	);
    }

    public function all()
    {
        return PaymentGatewayResource::collection(
            PaymentGateway::orderBY('id', 'desc')->get()
        );
    }

    public function store(Request $request)
    {
    	$id = $request->id;

    	$geteway = PaymentGateway::find($id);

    	$status = $geteway->status == 'enable' ? 'disable' : 'enable'; 

    	$geteway->update(['status' => $status]);

    	return PaymentGatewayResource::collection(
    		PaymentGateway::orderBY('id', 'desc')->get()
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

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Thank You for Your payment. The deposit is successfully submit and is now being processed in our system.'
        // ]);
        return (new UserResource($request->user())
            )->additional(['success' => true]);
    }

    public function transaction(Request $request)
    {
        return DepositResource::collection(
            $request->user()->deposits()
                ->orderBY('id', 'desc')->get()
        );
    }
}
