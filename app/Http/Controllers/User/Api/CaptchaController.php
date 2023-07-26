<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;

class CaptchaController extends Controller
{
    public function getCaptchaImageSrc()
    {
        return response()->json(captcha_src());
    }
}
