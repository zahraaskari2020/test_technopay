<?php

namespace App\Http\Controllers\Backoffice\Order;

use App\Http\Requests\BackOffice\Order\OrderIndexRequest;
use App\Interfaces\BackOffice\Order\OrderControllerInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\User\UserRepository;
use App\Notifications\ShowOrders;
use Illuminate\Http\JsonResponse;
use App\Tools\ResponseOutput\ResponseController;
use Exception;

class OrderController extends ResponseController implements OrderControllerInterface
{
    private OrderRepository $orderRepository;
    private UserRepository $userRepository;
    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
    }
    public function index(OrderIndexRequest $request): JsonResponse
    {
        $admin = $this->userRepository->findAdmin();
        try {
            $filter_array = [
                'mobile'            => $request->input('mobile'),
                'price_to'          => $request->input('price_to'),
                'price_from'        => $request->input('price_from'),
                'national_code'     => $request->input('national_code'),
                'status'            => $request->input('status'),
            ];
            $data = $this->orderRepository->filterBy($filter_array);
            return $this->respond($data);
        }
        catch (Exception $exception) {
            Log::error($exception->getMessage());
            // for notification, we can use Notification facades too.like :
            //  Notification::route('mail', env('MAIL_ADMIN)
            //     ->route('SMS provider', env('MOBILE_ADMIN'))
            //      ->notify(new ShowOrders()));
            $admin->notify((new ShowOrders()));
            return $this->respondNotFound();
        }

    }
}
