<?php


namespace App\Traits;


trait WebResponse
{
    protected function successResponse($data, $message = null, $code  = 200)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }

    protected function errorResponse($data, $message = null, $code = 500)
    {
        return response()->json([
            'code' => $code,
            'messsage' => $message,
            'data' => $data
        ]);
    }
}
