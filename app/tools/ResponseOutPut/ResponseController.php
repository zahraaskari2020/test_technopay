<?php

namespace App\Tools\ResponseOutput;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as Res;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class ResponseController extends Controller
{
    public function respond($data)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => Res::HTTP_OK,
            'data' => $data,
        ], Res::HTTP_OK, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    public function respondNotFound($msg = 'not found!')
    {
        return response()->json([
            'status'      => 'error',
            'status_code' => Res::HTTP_NOT_FOUND,
            'message'     => $msg,
        ], Res::HTTP_NOT_FOUND, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

}
