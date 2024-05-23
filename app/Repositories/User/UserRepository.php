<?php


namespace App\Repositories\User;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class UserRepository implements UserRepositoryInterface
{

    private User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findAdmin()
    {
        return $this->model->where('isAdmin', 1)->first();
    }

}
