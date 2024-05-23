<?php


namespace App\Components\Filters\OrderFilters;


use App\Components\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class National_code extends QueryFilter
{

    public function handle($value): void
    {
        $this->query->whereHas('user', function (Builder $query) use ($value) {
            $query->where('national_code', 'like', '%' . $value . '%');
        });
    }
}
