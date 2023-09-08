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
                <h2>訂單已送出</h2>
            </div>
            <div class="complete__content">
                <h3 class="orderNum"><span class="text">訂單編號</span><span class="num">{{ $orderNumber }}</span></h3>
                <h4 class="note">請拍照、截圖，或確認您的Email，<span class="highlight">保留訂單編號</span>以便日後查詢</h4>
                <div class="decoImg">
                    <img src="/img/img-complete.png" class="image">
                </div>
            </div>
        </div>
    </section>
@endsection
