<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Requests\StoreOrderSecondRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderFormController
{
    /**
     * @param StoreOrderSecondRequest $request
     * @return JsonResponse
     */
    public function validation(StoreOrderSecondRequest $request): JsonResponse
    {
        $response = [];
        $statusCode = 200;

        return response()->json($response, $statusCode);
    }
}
