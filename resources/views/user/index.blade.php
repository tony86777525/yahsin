@inject('mainPresenter', 'App\Presenters\MainPresenter')

@extends('user.basic.main.top')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset("css/user/index.css") }}">
@endsection

@section('main')
    <section class="main">
        <section class="landing">
            <div class="landing__content">
                <h1 class="siteName">
                    {{ __('user.index.title') }}
                </h1>
                <h2 class="slogan">
                    <form action="{{ route('user.uploadPDF') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="pdf_file">
                        <button type="submit">Upload</button>
                    </form>
                </h2>
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
