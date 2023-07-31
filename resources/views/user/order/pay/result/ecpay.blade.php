@extends('user.basic.wrapper')
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
    付款結果
@endsection
<!-- Page js /begin -->
@section('page_js')
    <script>
    </script>
@endsection
<!-- Page js /end -->
