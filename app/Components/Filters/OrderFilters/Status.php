<?php


namespace App\Components\Filters\OrderFilters;


use App\Components\Filters\QueryFilter;

class Status extends QueryFilter
{

    public function handle($value): void
    {
        $this->query->where('status', $value);
    }
}
