<?php

namespace App\Providers;

use App\Http\View\Composers\Advertising;
use App\Http\View\Composers\CategoryComposer;
use App\Http\View\Composers\FeaturedEmployer;
use App\Http\View\Composers\HomeFilter;
use App\Http\View\Composers\HomeListing;
use App\Http\View\Composers\PackageComposer;
use App\Http\View\Composers\UrgentJob;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['layouts.home'], 
            PackageComposer::class
        );

        View::composer(
            ['home.partials.browse-job'], 
            CategoryComposer::class
        );

        View::composer(
            ['home.partials.home-filter'], 
            HomeFilter::class
        );

        View::composer(
            ['home.partials.popular-search'], 
            HomeListing::class
        );

        View::composer(
            ['home.partials.urgent-job'], 
            UrgentJob::class
        );

        View::composer(
            ['ads.two', 'ads.one', 'ads.three', 'ads.four'], 
            Advertising::class
        );

        View::composer(
            ['home.partials.featured-employers'], 
            FeaturedEmployer::class
        );
    }
}
