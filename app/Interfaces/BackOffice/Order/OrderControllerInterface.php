<?php


namespace App\Interfaces\BackOffice\Order;

use App\Http\Requests\BackOffice\Order\OrderIndexRequest;

interface OrderControllerInterface
{

    public function index(OrderIndexRequest $request);
}
