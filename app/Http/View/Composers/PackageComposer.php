<?php

namespace App\Http\View\Composers;

use App\Models\Package;
use Illuminate\View\View;

class PackageComposer
{
    public function compose(View $view)
    {
        $view->with('packages', Package::get());
    }
}