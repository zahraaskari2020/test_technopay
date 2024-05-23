<?php


namespace App\Components\Filters\OrderFilters;


use App\Components\Filters\QueryFilter;

class Price_to extends QueryFilter
{

    public function handle($value): void
    {
        $this->query->where('price', '<=', (float)$value);
    }
}
