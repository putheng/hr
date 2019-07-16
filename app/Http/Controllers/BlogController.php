<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show(Request $request, Blog $blog)
    {
    	return view('blog.show', compact('blog'));
    }
}
