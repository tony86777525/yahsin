來自「{{ env('APP_NAME') }}」網站的訂單內容：
<br>
<ol>
    <li>
        <b>Number</b>
        <div>{{ $number }}</div>
    </li>
    <li>
        <b>Name</b>
        <div>{{ $name }}</div>
    </li>
    <li>
        <b>E-mail</b>
        <div>{{ $email }}</div>
    </li>
    <li>
        <b>Destination Country</b>
        <div>{{ $country }}</div>
    </li>
    <li>
        <b>Recipient Name</b>
        <div>{{ $recipient_name }}</div>
    </li>
    <li>
        <b>Recipient Company Name</b>
        <div>{{ $recipient_company_name }}</div>
    </li>
    <li>
        <b>Recipient Country</b>
        <div>{{ $recipient_address_nation }}</div>
    </li>
    <li>
        <b>Recipient Region</b>
        <div>{{ $recipient_address_country }}</div>
    </li>
    <li>
        <b>Recipient Postcode</b>
        <div>{{ $recipient_address_code }}</div>
    </li>
    <li>
        <b>Recipient Address</b>
        <div>{{ $recipient_address }}</div>
    </li>
    <li>
        <b>Recipient Phone</b>
        <div>{{ $recipient_tel }}</div>
    </li>
    <li>
        <b>Recipient Email Address</b>
        <div>{{ $recipient_email }}</div>
    </li>
</ol>
<br>
--- 這封信來自網址 {{ env('APP_URL') }}
