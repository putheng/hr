<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	public function login(LoginFormRequest $request)
    {

        if (!$token = auth('api')->attempt($request->only(['email', 'password']))) {
            return response()->json([
                'errors' => [
                    'email' => ['Sorry we couldn\'t sign you in with those details.']
                ]
            ], 422);
        }
        
        return (new UserResource(auth('api')->user()))
            ->additional([
                'meta' => [
                    'token' => $token
                ]
            ]);
    }
}
