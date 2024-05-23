<?php


namespace App\Components\Filters\OrderFilters;


use App\Components\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class Mobile extends QueryFilter
{

    public function handle($value): void
    {
        $this->query->whereHas('user', function (Builder $query) use ($value) {
            $query->where('mobile', 'like', '%' . $value . '%');
        });
    }
}
