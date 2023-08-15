@extends('user.basic.wrapper')

@push('csrf_token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endPush

@push('page_css')
<link rel="stylesheet" href="css/user/cart.css" />
@endPush

@section('main')
<form action="" class="form form--cart">
    <div class="form__cart">
        <div class="wrapper">
            <div class="cart">
                <div class="cart__sample"></div>
                <div class="cart__content">
                    <h3 class="title">確認訂購份數</h3>
                    <p class="paragraph"></p>
                    <div class="amount"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="form__payment">
        <div class="wrapper">
            <ul class="payList">
                <li><input id="payment_creditcard" type="radio" name="payment" value="creditcard"><label for="payment_creditcard">信用卡</label></li>
                <li><input id="payment_paypal" type="radio" name="payment" value="paypal"><label for="payment_paypal">PayPal</label></li>
            </ul>
        </div>
    </div>
    <div class="form__delivery">
        <div class="wrapper">
            <div class="delivery">
                <div class="delivery__title"></div>
                <div class="delivery__form"></div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('page_script')
<script src="js/user/cart.js"></script>
@endPush
