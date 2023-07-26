@inject('mainPresenter', 'App\Presenters\MainPresenter')

@extends('user.basic.main.top')

@section('css')
{{--    <link rel="stylesheet" type="text/css" href="{{ asset("css/user/index.css") }}">--}}
@endsection

@section('main')
    <section class="main">
        <section class="landing">
            <div class="landing__content">
                <h1 class="siteName">
                    {{ __('user.index.title') }}
                </h1>
                <form
                    method="POST"
                    action="{{ route('user.order.store.second') }}"
                    enctype="multipart/form-data"
                    class="orderForm"
                >
                    @csrf
                    <input name="number" type="hidden" value="{{ $orderData->number }}">
                    <table>
                        <tbody>
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
                                <label>address:<input name="address" type="text" value="{{ old('address') ?? '新北市' }}"></label>
                                @error('address')
                                <div><span class="text-red-500">{{ $message }}</span></div>
                                @enderror
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr><td><button type="submit">前往付款</button></td></tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </section>
    </section>
@endsection

<!-- Page js /begin -->
@section('js')
    <script>
    </script>
@endsection
<!-- Page js /end -->
