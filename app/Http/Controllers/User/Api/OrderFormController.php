<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Requests\StoreOrderFirstRequest;
use App\Models\Order;
use App\Services\UploadToGoogleDrive;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OrderFormController
{
    /**
     * @param StoreOrderFirstRequest $request
     * @return JsonResponse
     */
    public function validation(StoreOrderFirstRequest $request): JsonResponse
    {
        $data = $request->all();

        return response()->json(['success' => true]);
    }
}
