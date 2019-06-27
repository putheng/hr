<?php

namespace App\Filters\Filter;

use Putheng\Filter\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class TitleFilter extends FilterAbstract
{
    /**
     * Mappings for database values.
     *
     * @return array
     */
    public function mappings()
    {
        return [
            'title' => 'title',
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

        return $builder->where('title', 'LIKE', '%'. $value .'%');
    }
}
