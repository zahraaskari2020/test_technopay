<?php


namespace App\Repositories\Order;


use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class OrderRepository implements OrderRepositoryInterface
{

    private Order $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function filterBy($filter_array)
    {
        return $this->model->filterBy($filter_array)->get();// scope functio
    }

}
