<?php

namespace App\Filters;

use App\Filters\Filter\CategoryFilter;
use App\Filters\Filter\LocationFilter;
use App\Filters\Filter\TitleFilter;
use Putheng\Filter\FiltersAbstract;

class ListingFilter extends FiltersAbstract
{
    /**
     * Default filters.
     * 
     * @var array
     */
    protected $filters = [
        'location' => LocationFilter::class,
        'category' => CategoryFilter::class,
        'title' => TitleFilter::class
    ];

    public static function mappings()
    {
        return [
            //
        ];
    }
}
