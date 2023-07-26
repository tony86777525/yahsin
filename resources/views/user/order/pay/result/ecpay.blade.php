@inject('mainPresenter', 'App\Presenters\MainPresenter')

@extends('user.basic.main.top')

@section('css')
{{--    <link rel="stylesheet" type="text/css" href="{{ asset("css/user/index.css") }}">--}}
@endsection

@section('main')
    @foreach($result as $title => $value)
        <table>
            <tr>
                <td>{{ $title }}</td>
                <td>{{ $value }}</td>
            </tr>
        </table>
    @endforeach
    success
@endsection

<!-- Page js /begin -->
@section('js')
    <script>
    </script>
@endsection
<!-- Page js /end -->
