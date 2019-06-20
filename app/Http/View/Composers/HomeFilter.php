<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use App\Models\Location;
use Illuminate\View\View;

class HomeFilter
{
    public function compose(View $view)
    {
        $view->with('categories', Category::get());
        $view->with('locations', Location::get());
    }
}