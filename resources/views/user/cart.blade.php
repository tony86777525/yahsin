@extends('user.basic.wrapper')

@push('csrf_token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endPush

@push('page_css')
<link rel="stylesheet" href="css/user/cart.css" />
@endPush

@section('main')
<section class="cart"></section>
@endsection

@push('page_script')
<script src="js/user/cart.js"></script>
@endPush
