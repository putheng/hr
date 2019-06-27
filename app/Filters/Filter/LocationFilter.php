<?php

namespace App\Filters\Filter;

use Putheng\Filter\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class LocationFilter extends FilterAbstract
{
    /**
     * Mappings for database values.
     *
     * @return array
     */
    public function mappings()
    {
        return [
            'location' => 'location_id',
        ];
    }

    /**
     * Filter by
     *
     * @param  string
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function filter(Builder $builder, $value)
    {
        // $value = $this->resolveFilterValue($value);

        if ($value === null) {
            return $builder;
        }

        return $builder->where('location_id', $value);
    }
}
