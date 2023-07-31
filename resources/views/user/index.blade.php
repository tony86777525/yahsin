@extends('user.basic.wrapper')

@push('csrf_token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endPush

@push('page_css')
    <style>
        .captcha .refresh {
            display: inline-block;
            vertical-align: middle;
            cursor: pointer;
            width: 30px;
            height: 30px;
            background-image: url("/images/user/refresh.png");
            background-size: 30px 30px;
        }
    </style>
@endPush

@section('main')
<section class="landing">
    <div class="wrapper">
        <div class="landing__content">
            <div class="landingForm">
                <form
                    method="POST"
                    action="{{ route('user.order.store.first') }}"
                    enctype="multipart/form-data"
                    class="form form--order"
                >
                    @csrf
                    <div class="form__row">
                        <div class="formCol">
                            <span class="formLabel">姓名</span>
                            <div class="fancyWrap fancyWrap--inputTxt">
                                <input type="text" class="fancyInput fancyInput--inputTxt">
                            </div>
                        </div>
                        <div class="formCol">
                            <span class="formLabel">檔案1</span>
                            <div class="fancyWrap fancyWrap--inputFile">
                                <label data-input-id="inputLabel">
                                    <span class="fancyInput fancyInput--inputFile" data-input-id="uploadFile">選擇檔案</span>
                                    <input type="file" class="fancyInput fancyInput--hidden" data-input-id="hiddenFile">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form__row">
                        <div class="formCol"></div>
                        <div class="formCol"></div>
                    </div>
                    <table>
                        <tbody>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @error('files')
                        <tr><td><div><span class="text-red-500">{{ $message }}</span></div></td></tr>
                        @enderror
                        <tr>
                            <td>
                                <label>name:<input name="name" type="text" value="{{ old('name') ?? 'ddd' }}"></label>
                                @error('name')
                                <div><span class="text-red-500">{{ $message }}</span></div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>email:<input name="email" type="text" value="{{ old('email') ?? 'd@gmail.com' }}"></label>
                                @error('email')
                                <div><span class="text-red-500">{{ $message }}</span></div>
                                @enderror
                            </td>
                        </tr>
                        <tr><td>
                                <label>country:<select name="country">
                                        @foreach($countryOptions as $countryId => $countryOption)
                                            <option value="{{ $countryId }}">{{ $countryOption }}</option>
                                        @endforeach
                                    </select></label>
                            </td></tr>
                        @for($i = 0; $i < 3; $i++)
                            <tr>
                                <td>
                                    <input type="file" name="files[]" value="{{ old("files.$i") ?? '' }}">
                                    @error("files.$i")
                                    <div><span class="text-red-500">{{ $message }}</span></div>
                                    @enderror
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>
                                <input name="captcha" type="text" class="fancyInput fancyInput--captcha" autocomplete="off">
                                <div class="captcha">
                                    <img src="{{ captcha_src() }}" alt="">
                                    <i class="refresh" data-js="refresh-captcha" data-js-url="{{ route('user.api.captcha.reload') }}"></i>
                                </div>
                            </td>
                        </tr>
                        <tr><td><button type="submit">送出確認</button></td></tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('page_script')
<script src="js/user/index.js"></script>
@endPush
