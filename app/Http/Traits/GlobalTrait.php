<?php

namespace App\Http\Traits;


/**
 *
 */
trait GlobalTrait
{


    public function success($data)
    {
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }


    public function error($data, $msg, $code = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $msg,
        ], $code);
    }
}
