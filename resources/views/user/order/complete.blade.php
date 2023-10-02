@extends('user.basic.wrapper')

@push('csrf_token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endPush

@push('page_css')
    <link rel="stylesheet" href="/css/user/complete.css" />
@endPush
@section('main')
    <section class="complete">
        <div class="wrapper">
            <div class="complete__title">
                <h2>{{ __('user.complete.title') }}</h2>
            </div>
            <div class="complete__content">
                <h3 class="orderNum"><span class="text">{{ __('user.complete.content.order_number') }}</span><span class="num">{{ $orderNumber }}</span></h3>
                <h4 class="note">{!! __('user.complete.content.note') !!}</h4>
                @if (!empty($isBankTransfer))
                    <div class="backTransfer">
                        <div class="backTransfer__title">{{ __('user.complete.bankTransfer.title') }}</div>
                        <div class="backTransfer__subTitle">{{ __('user.complete.bankTransfer.subTitle') }}</div>
                        <div class="backTransfer__content">
                            {!! __('user.complete.bankTransfer.content') !!}
                        </div>
                        <div class="backTransfer__message">
                            <div class="backTransfer__message__title">{!! __('user.complete.bankTransfer.message.title') !!}</div>
                            <div class="backTransfer__message__content">{!! __('user.complete.bankTransfer.message.content') !!}</div>
                        </div>
                    </div>
                @endif
                <div class="decoImg">
                    <img src="/img/img-complete.png" class="image">
                </div>
            </div>
        </div>
    </section>
@endsection
