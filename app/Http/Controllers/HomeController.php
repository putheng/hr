<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
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
        $about = Page::where('type', 1)->first();

        return view('home.about', compact('about'));
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

    public function basic()
    {
        $about = Page::where('type', 2)->first();

        return view('home.basic_job', compact('about'));
    }

    public function contact()
    {
        $about = Page::where('type', 7)->first();

        return view('home.contact_us', compact('about'));
    }

    public function urgent()
    {
        $about = Page::where('type', 3)->first();

        return view('home.urgent_job', compact('about'));
    }

    public function featured()
    {
        $about = Page::where('type', 4)->first();

        return view('home.fe', compact('about'));
    }

    public function recruitment()
    {
        $about = Page::where('type', 5)->first();

        return view('home.rea', compact('about'));
    }

    public function banner()
    {
        $about = Page::where('type', 6)->first();

        return view('home.banner_add', compact('about'));
    }
}
