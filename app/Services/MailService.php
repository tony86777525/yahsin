<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class MailService
{
    public static function sendMail($data)
    {
        try {

            $postNoticeMailData = self::getPostNoticeMailData($data['email'], $data['name']);

            Mail::send('email.post', $data->toArray(), function($message) use ($postNoticeMailData) {
                $message->to($postNoticeMailData['toMail'], $postNoticeMailData['toName'])
                    ->subject($postNoticeMailData['subject']);

                $message->from($postNoticeMailData['fromMail'], $postNoticeMailData['fromName']);
            });

            return true;
        } catch (Exception $e) {}

        return false;
    }

    private static function getPostNoticeMailData($email, $name)
    {
        $subject = 'Yahsin Order';
        $fromName = 'Yahsin';
        $fromMail = env('MAIL_USERNAME');
        $toName = $name;
        $toMails = [
            $email
        ];

        return [
            'subject' => $subject,
            'fromMail' => $fromMail,
            'fromName' => $fromName,
            'toMail' => $toMails,
            'toName' => $toName,
        ];
    }
}
