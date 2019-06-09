<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\TermResource;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|unique:salaries,name'
    	]);

    	Term::create(['name' => $request->title]);

    	return TermResource::collection(
    		Term::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function show()
    {
    	return TermResource::collection(Term::get());
    }
}
