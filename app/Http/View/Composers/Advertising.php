<?php

namespace App\Http\View\Composers;

use App\Models\Advertising as AdvertisingModel;
use Illuminate\View\View;

class Advertising
{
    public function compose(View $view)
    {
        $view->with(
        	'two',
        	AdvertisingModel::where('area', '2')
        	->inRandomOrder()->limit(1)->isLive()->first()
        );

        $view->with(
        	'three',
        	AdvertisingModel::where('area', '3')
        	->inRandomOrder()->limit(1)->isLive()->first()
        );

        $view->with(
        	'four',
        	AdvertisingModel::where('area', '4')
        	->inRandomOrder()->limit(1)->isLive()->first()
        );

        $view->with(
        	'one',
        	AdvertisingModel::with('file')->where('area', '1')
        	->inRandomOrder()->limit(3)->isLive()->get()
        );
    }
}