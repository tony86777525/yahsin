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
@push('page_script')
    <script>
        $('form[data-js-pay="ecpay"]').on('submit', function (event) {
            event.preventDefault();
            let form = $(this);
            let url = form.attr('action');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: url,
                dataType: "JSON",
                data: form.serialize(),
                beforeSend : function() {},
                success: function (res) {
                    if (res.success === true) {
                        $('[data-js-pay="result"]').html(res.result);
                    }
                },
                complete: function () {
                },
                error: function(res) {
                    console.log(res);
                }
            });
        });

        $('form[data-js-search="ecpay"]').on('submit', function (event) {
            event.preventDefault();

            let form = $(this);
            let url = form.attr('action');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: url,
                dataType: "JSON",
                data: form.serialize(),
                beforeSend : function() {},
                success: function (res) {
                    if (res.success === true) {
                        let result = $.map(res.result, function(v, k){
                            return `${k}:${v}`;
                        }).join('\n');
                        alert(result);
                    }
                },
                complete: function () {
                },
                error: function(res) {
                    console.log(res);
                }
            });
        });
    </script>
@endPush
<!-- Page js /end -->
