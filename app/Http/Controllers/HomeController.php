<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function about()
    {
        return view('home.about');
    }

    public function qa()
    {
        $questions = Question::get();

        return view('home.qa', compact('questions'));
    }

    public function tip()
    {
        $tips = Blog::orderBy('id', 'desc')->get();

        return view('home.tips', compact('tips'));
    }
}
