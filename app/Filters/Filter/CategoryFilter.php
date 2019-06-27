<?php

namespace App\Filters\Filter;

use Putheng\Filter\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends FilterAbstract
{
    /**
     * Mappings for database values.
     *
     * @return array
     */
    public function mappings()
    {
        return [
           'category' => 'category',
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
        return $builder->where('category_id', $value);
    }
}
