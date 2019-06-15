<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeRequestr;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
    	return view('employer.register');
    }

    public function store(StoreEmployeRequestr $request)
    {
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->save();

        $user->assignRole('employer');
        
    	$user->company()->create([
    		'name' => $request->company,
    		'phone' => $request->phone,
    		'address' => $request->address,
    	]);

    	return redirect()->route('login.employer')->withSuccess('Register successfully, please login');
    }
}
