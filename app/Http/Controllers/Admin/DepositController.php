<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\DepositResource;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function all()
    {
    	return DepositResource::collection(
    		Deposit::latest()->paginate(15)
    	);
    }

    public function pending()
    {
    	return DepositResource::collection(
    		Deposit::latest()->isPending()->paginate(15)
    	);
    }

    public function accepted()
    {
    	return DepositResource::collection(
    		Deposit::latest()->isAccepted()->paginate(15)
    	);
    }

    public function rejected()
    {
    	return DepositResource::collection(
    		Deposit::latest()->isRejected()->paginate(15)
    	);
    }
}
