<div style="width: 640px; margin: 0 auto; color: #333;">
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

    <div style="margin: 20px auto 0">
        <img
            style="width:100%; height:auto;"
            width="100%"
            height="auto"
            src="{{ url("img/img-email-logoAndLine.jpg") }}" alt=""
        >
    </div>
</div>

