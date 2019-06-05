<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;

class RegisterController extends Controller
{
    public function register(RegisterFormRequest $request)
    {
    	$user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        if (!$token = auth('api')->attempt($request->only(['email', 'password']))) {
            return abort(401);
        }

        return (new UserResource(auth('api')->user()))
            ->additional([
                'meta' => [
                    'token' => $token
                ]
            ]);
    }
}
