<?php

namespace App\Services;

use App\Mail\UserCheck;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public static function send_create_token(User $user)
    {

        Mail::to($user['email'])->send(new UserCheck($user));
        $message = '驗證信已寄送!'. "\n" . '請至Email驗證!';

        return $message;
    }
}
