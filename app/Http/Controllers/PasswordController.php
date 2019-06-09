<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordStoreRequest;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function store(PasswordStoreRequest $request)
    {
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);
        
        return response()->json([
        	'success' => true,
        	'message' => 'Password successfully changed'
        ]);
    }
}
