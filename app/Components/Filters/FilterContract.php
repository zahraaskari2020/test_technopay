<?php


namespace App\Components\Filters;


interface FilterContract
{
    public function handle($value): void;
}
