@inject('mainPresenter', 'App\Presenters\MainPresenter')

@extends('user.basic.main.top')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset("css/user/index.css") }}">
@endsection

@section('main')
    <section class="landing">
        {{ __('user.index.title') }}
        {{ $mainPresenter->title() }}

        <form action="{{ route('user.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="pdf_file">
            <button type="submit">Upload</button>
        </form>
    </section>
@endsection

<!-- Page js /begin -->
@section('js')
    <script>
    </script>
@endsection
<!-- Page js /end -->
