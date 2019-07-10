<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
	public function switch($locale)
	{
		$lang = ['en', 'ch', 'kh'];

		if(in_array($locale, $lang)){
			session()->put('locale', $locale);
		}

    	return back();
	}
}
