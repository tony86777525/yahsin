@extends('user.basic.wrapper')

@push('csrf_token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endPush

@push('page_css')
@endPush

@section('main')
    <section class="main">
        <section class="landing">
            <div class="landing__content">
                <h1 class="siteName">
                    {{ __('user.index.title') }}
                </h1>
                <table>
                    <tbody>
                    <tr>
                        <td>
                            <label>number:{{ $orderData->number }}</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>amount:{{ $orderData->amount }}</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>name:{{ $orderData->name }}</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>email:{{ $orderData->email }}</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>country:{{ $orderData->country_display }}</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>address:{{ $orderData->address }}</label>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>

                <form
                    method="POST"
                    action="{{ route('user.api.order.pay.ecpay.credit') }}"
                    class="orderForm"
                    data-js-pay="ecpay"
                >
                    <input type="hidden" name="number" value="{{ $orderData->number }}">
                    <button type="submit">ECPay付款</button>
                </form>
                <form
                    method="POST"
                    action="{{ route('user.api.order.pay.ecpay.search') }}"
                    class="orderForm"
                    data-js-search="ecpay"
                >
                    <input type="hidden" name="number" value="{{ $orderData->number }}">
                    <button type="submit">ECPay查詢訂單</button>
                </form>
                <div data-js-pay="result"></div>
            </div>
        </section>
    </section>
@endsection

<!-- Page js /begin -->
@push('page_js')
    <script>
    </script>
@endPush
<!-- Page js /end -->
