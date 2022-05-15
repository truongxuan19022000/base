<?php


namespace App\Services;

class BaseService
{

    function res($data, $status = true, $message = null) {
        return [
            'status' => $status,
            'data' => $data,
            'message' => $message
        ];
    }

}
