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
                            <label>address:{{ $orderData->address }}</label>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
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
