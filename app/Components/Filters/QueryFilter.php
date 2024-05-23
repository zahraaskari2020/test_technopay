<?php


namespace App\Components\Filters;


abstract class QueryFilter implements FilterContract
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }
}
