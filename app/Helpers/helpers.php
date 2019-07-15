<?php

use App\Models\Location;
use App\Models\Term;

use App\Models\{
	Category,
	Education,
	Experience,
	Industry,
	Level
};

if(!function_exists('get_level'))
{
	function get_level($id){
		return Level::find($id);
	}
}

if(!function_exists('get_category'))
{
	function get_category($id){
		return Category::find($id);
	}
}

if(!function_exists('get_industry'))
{
	function get_industry($id){
		return Industry::find($id);
	}
}

if(!function_exists('get_experience'))
{
	function get_experience($id){
		return Experience::find($id);
	}
}

if(!function_exists('get_education'))
{
	function get_education($id){
		return Education::find($id);
	}
}

if(!function_exists('get_term'))
{
	function get_term($id){
		return Term::find($id);
	}
}

if(!function_exists('get_location'))
{
	function get_location($id){
		return Location::find($id);
	}
}