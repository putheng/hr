<?php

namespace App\Http\View\Composers;

use App\Models\Company;
use Illuminate\View\View;

class FeaturedEmployer
{
	public function compose(View $view)
	{
		$company = Company::isFeatured()->take(12)->inRandomOrder()->get();

		$view->with('features', $company);
	}
}