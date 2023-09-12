{!! __('email.detail', [
    'recipient_name' => $recipient_name,
    'number' => $number,
    'recipient_address_nation' => $recipient_address_nation,
    'recipient_address_country' => $recipient_address_country,
    'recipient_address_code' => $recipient_address_code,
    'recipient_address' => $recipient_address,
    'recipient_tel' => $recipient_tel,
    'email' => env('MAIL_USERNAME'),
    ]) !!}
