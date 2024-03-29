@extends('user.basic.wrapper')

@push('csrf_token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endPush

@push('page_css')
    <link rel="stylesheet" href="/css/user/cart.css" />
    <link rel="gettext" type="application/x-po" href="/languages/{{ app()->getLocale() }}.po" />
@endPush

@section('main')
    <form
        method="POST"
        action="{{ route('user.order.store.second') }}"
        enctype="multipart/form-data"
        class="trolley trolley--cart"
    >
        @csrf
        <input name="number" type="hidden" value="{{ $orderData->number }}">
        <div class="trolley__cart">
            <div class="wrapper">
                <div class="cart">
                    <div class="cart__sample">
                        <img src="/img/img-apostille.jpg" alt="" class="image">
                    </div>
                    <div class="cart__content form">
                        <div class="form__title"><h2>{{ __('user.cart.title') }}</h2></div>
                        <div class="form__content">
                            <div class="price">
                                <div class="price__bill">
                                    <div class="billSelect">
                                        <div class="fancyWrap fancyWrap--bill">
                                            <select name="bill" class="fancySelect fancySelect--bill">
                                                <option value="TWD">NT$</option>
                                                <option value="USD">USD</option>
                                                <option value="CNY">RMB￥</option>
                                            </select>
                                        </div>
                                        <span class="error"></span>
                                    </div>
                                    <div class="priceShow">{!! __('user.cart.content.price', ['price' => App\Models\Order::PRICE]) !!}</div>
                                </div>
                                <div class="price__note">{{ __('user.cart.content.price.note') }}</div>
                            </div>
                            <p class="paragraph">{!! __('user.cart.content.paragraph') !!}</p>
                            <div class="amount">
                                <div class="amount__text">{{ __('user.cart.content.amount') }}</div>
                                <div class="amount__manual">
                                    <div class="insert">
                                        <div class="fancyWrap fancyWrap--inputTxt">
                                            <label>
                                                <input name="amount" type="number" value="1" class="fancyInput fancyInput--inputTxt">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="action">
                                        <div class="btnWrap btnWrap--submit">
                                            <button type="button" class="btn btn--submit" data-js-button="amount"><span class="btn__text">{{ __('user.cart.content.amount.button') }}</span></button>
                                        </div>
                                    </div>
                                </div>
                                <span class="error" data-error="amount"></span>
                                <div class="amount__price">
                                    {{ __('user.cart.content.amount.total_price') }}<span class="count" data-js="totalPrice">{{ App\Models\Order::PRICE }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="trolley__payment">
            <div class="wrapper">
                <div class="pay form">
                    <div class="form__title"><h2>{{ __('user.payment.title') }}</h2></div>
                    <div class="form__content">
                        <ul class="payList">
                            <li><input id="payment_creditcard" type="radio" name="payment_type" value="{{ \App\Models\Order::PAYMENT_TYPE_ECPAY }}" class="fancyInput fancyInput--hidden  fancyInput--radio"><label for="payment_creditcard">{{ __('user.payment.type.1') }}</label></li>
                            <li><input id="payment_banktransfer" type="radio" name="payment_type" value="{{ \App\Models\Order::PAYMENT_TYPE_BANK_TRANSFER }}" class="fancyInput fancyInput--hidden  fancyInput--radio"><label for="payment_banktransfer">{{ __('user.payment.type.3') }}</label></li>
                            {{--<li><input id="payment_paypal" type="radio" name="payment_type" value="{{ \App\Models\Order::PAYMENT_TYPE_PAYPAL }}" class="fancyInput fancyInput--hidden fancyInput--radio"><label for="payment_paypal">{{ __('user.payment.type.2') }}</label></li>--}}
                        </ul>
                        <span class="error" data-error="payment_type"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="trolley__delivery">
            <div class="wrapper">
                <div class="delivery">
                    <div class="delivery__form form form--delivery">
                        <div class="form__title">
                            <h2>{{ __('user.delivery.title') }}</h2>
                        </div>
                        <div class="form__row form__row--default">
                            <div class="formCol">
                                <span class="formLabel">{{ __('user.delivery.recipient_name') }}</span>
                                <div class="fancyWrap fancyWrap--inputTxt">
                                    <label>
                                        <input
                                            name="recipient_name"
                                            type="text"
                                            value="{{ old('recipient_name') ?? '' }}"
                                            class="fancyInput fancyInput--inputTxt">
                                    </label>
                                </div>
                                <span class="error" data-error="recipient_name"></span>
                            </div>
                            <div class="formCol">
                                <span class="formLabel">{{ __('user.delivery.recipient_company_name') }}</span>
                                <div class="fancyWrap fancyWrap--inputTxt">
                                    <label>
                                        <input
                                            name="recipient_company_name"
                                            type="text"
                                            value="{{ old('recipient_company_name') ?? '' }}"
                                            class="fancyInput fancyInput--inputTxt">
                                    </label>
                                </div>
                                <span class="error" data-error="recipient_company_name"></span>
                            </div>
                        </div>
                        <div class="form__row form__row--area">
                            <div class="formCol">
                                <span class="formLabel">{{ __('user.delivery.recipient_address_nation') }}</span>
                                <div class="fancyWrap fancyWrap--country">
                                    <select name="recipient_address_nation" class="fancySelect fancySelect--country gds-cr gds-countryflag select2" id="countrySelection" country-data-region-id="gds-cr-one" data-language="{{ app()->getLocale() }}">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <span class="error" data-error="recipient_address_nation"></span>
                            </div>
                            <div class="formCol">
                                <span class="formLabel">{{ __('user.delivery.recipient_address_country') }}</span>
                                <div class="fancyWrap fancyWrap--country">
                                    <select name="recipient_address_country" class="fancySelect fancySelect--country" id="gds-cr-one">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <span class="error" data-error="recipient_address_country"></span>
                            </div>
                            <div class="formCol">
                                <span class="formLabel">{{ __('user.delivery.recipient_address_code') }}</span>
                                <div class="fancyWrap fancyWrap--inputTxt">
                                    <label>
                                        <input
                                            name="recipient_address_code"
                                            type="text"
                                            value="{{ old('recipient_address_code') ?? '' }}"
                                            class="fancyInput fancyInput--inputTxt">
                                    </label>
                                </div>
                                <span class="error" data-error="recipient_address_code"></span>
                            </div>
                        </div>
                        <div class="form__row form__row--address">
                            <div class="formCol">
                                <span class="formLabel">{{ __('user.delivery.recipient_address') }}</span>
                                <div class="fancyWrap fancyWrap--inputTxt">
                                    <label>
                                        <input
                                            name="recipient_address"
                                            type="text"
                                            value="{{ old('recipient_address') ?? '' }}"
                                            class="fancyInput fancyInput--inputTxt">
                                    </label>
                                </div>
                                <span class="error" data-error="recipient_address"></span>
                            </div>
                        </div>
                        <div class="form__row form__row--default">
                            <div class="formCol">
                                <span class="formLabel">{{ __('user.delivery.recipient_tel') }}</span>
                                <div class="fancyWrap fancyWrap--inputTxt">
                                    <label>
                                        <input
                                            name="recipient_tel"
                                            type="text"
                                            value="{{ old('recipient_tel') ?? '' }}"
                                            class="fancyInput fancyInput--inputTxt">
                                    </label>
                                </div>
                                <span class="error" data-error="recipient_tel"></span>
                            </div>
                            <div class="formCol">
                                <span class="formLabel">{{ __('user.delivery.recipient_email') }}</span>
                                <div class="fancyWrap fancyWrap--inputTxt">
                                    <label>
                                        <input
                                            name="recipient_email"
                                            type="text"
                                            value="{{ old('recipient_email') ?? '' }}"
                                            class="fancyInput fancyInput--inputTxt">
                                    </label>
                                </div>
                                <span class="error" data-error="recipient_email"></span>
                            </div>
                        </div>
                        <div class="form__action">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <ul class="actions">
                                <li class="btnWrap btnWrap--submit">
                                    <button type="button" class="btn btn--submit" data-form-button="submit"><span class="btn__text">{{ __('user.cart.submit.button') }}</span></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="overlay" data-js-form="overlay"></div>
@endsection

@push('page_script')
    <script src="/js/user/cart.js"></script>
    <script src="/languages/geodatasource-cr.min.js"></script>
    <script src="/languages/gettext.js"></script>
    <script>
        window.orderPrice = {{ App\Models\Order::PRICE }};
        window.orderPriceRate = 1;
    </script>
@endPush
