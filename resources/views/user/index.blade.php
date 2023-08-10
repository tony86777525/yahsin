@extends('user.basic.wrapper')

@push('csrf_token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endPush

@push('page_css')
<link rel="stylesheet" href="css/user/index.css" />
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
                    <div class="form__title">
                        <h2>開始訂購您的海牙認證</h2>
                        <p>請上傳數位文件的副本。<br>您可以從電腦中上傳文件，或是用手機拍照上傳</p>
                    </div>
                    <div class="form__row">
                        <div class="formCol">
                            <span class="formLabel">姓名</span>
                            <div class="fancyWrap fancyWrap--inputTxt">
                                <label>
                                    <input name="name" type="text" value="{{ old('name') ?? 'ddd' }}" class="fancyInput fancyInput--inputTxt">
                                </label>
                            </div>
                        </div>
                        <div class="formCol">
                            <span class="formLabel">檔案1</span>
                            <div class="fancyWrap fancyWrap--inputFile" data-input-id="elWrap">
                                <label>
                                    <span class="fancyInput fancyInput--inputFile" data-input-id="uploadFile">選擇檔案</span>
                                    <input type="file" name="files[]" value="{{ old("files.0") ?? '' }}" class="fancyInput fancyInput--hidden" data-input-id="hiddenFile">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form__row">
                        <div class="formCol">
                            <span class="formLabel">Email</span>
                            <div class="fancyWrap fancyWrap--inputTxt">
                                <label>
                                    <input name="email" type="text" value="{{ old('email') ?? 'd@gmail.com' }}" class="fancyInput fancyInput--inputTxt">
                                </label>
                            </div>
                        </div>
                        <div class="formCol">
                            <span class="formLabel">檔案2</span>
                            <div class="fancyWrap fancyWrap--inputFile" data-input-id="elWrap">
                                <label>
                                    <span class="fancyInput fancyInput--inputFile" data-input-id="uploadFile">選擇檔案</span>
                                    <input type="file" name="files[]" value="{{ old("files.1") ?? '' }}" class="fancyInput fancyInput--hidden" data-input-id="hiddenFile">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form__row">
                        <div class="formCol">
                            <span class="formLabel">文件使用國家</span>
                            <div class="fancyWrap fancyWrap--country">
                                <select name="country" class="fancySelect fancySelect--country">
                                    @foreach($countryOptions as $countryId => $countryOption)
                                        <option value="{{ $countryId }}">{{ $countryOption }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="formCol">
                            <span class="formLabel">檔案3</span>
                            <div class="fancyWrap fancyWrap--inputFile" data-input-id="elWrap">
                                <label>
                                    <span class="fancyInput fancyInput--inputFile" data-input-id="uploadFile">選擇檔案</span>
                                    <input type="file" name="files[]" value="{{ old("files.2") ?? '' }}" class="fancyInput fancyInput--hidden" data-input-id="hiddenFile">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form__action">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <ul class="actions">
                            <li class="btnWrap btnWrap--submit">
                                <button type="submit" class="btn btn--submit"><span class="btn__text">送出確認</span></button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
            <div class="landingText">
                <h3>海牙認證線上服務</h3>
                <ul>
                    <li>我們針對【文件副本】快速辦理海牙認證</li>
                    <li>您無須提供文件正本</li>
                    <li>上傳您的文件電子檔，任何數位格式即可完成</li>
                    <li>48小時內確認，辦理時間【10-12工作天】</li>
                    <li>固定費用【NTD8800元】</li>
                    <li>完成後國際快遞 SF/DHL EXPRESS 全球寄送【免運費】</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="feature">
    <div class="wrapper">
        <div class="boxShadow">
            <div class="featureBoard boxShadow__content">
                <ul class="featureBoard__list">
                    <li>
                        <div class="featureItem">
                            <div class="featureItem__title" data-js-count="true" data-count="8500">+<span>8500</span><em>件</em></div>
                            <div class="featureItem__content">我們辦理海牙認證</div>
                        </div>
                    </li>
                    <li>
                        <div class="featureItem">
                            <div class="featureItem__title" data-js-count="true" data-count="8800"><em>NTD</em><span>8800</span><em>元</em></div>
                            <div class="featureItem__content">固定費用</div>
                        </div>
                    </li>
                    <li class="trans">
                        <div class="featureItem">
                            <div class="featureItem__title">全球免運費</div>
                            <div class="featureItem__content">
                                <img src="/img/img-trans-dhl.png" alt="" class="img-trans-dhl">
                                <img src="/img/img-trans-sf.png" alt="" class="img-trans-sf">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="featureItem">
                            <div class="featureItem__title">香港公證員</div>
                            <div class="featureItem__content">配合宣示</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="flow">
    <div class="wrapper">
        <h3 class="flow__title">快速5大步驟，免出門<br>在家線上就能完成海牙認證</h3>
        <div class="flow__content">
            <div class="intro"><span>快速受理數位副本文件的海牙認證，</span><span>針對【任何形式文件副本(數位檔)】</span><span>提供迅速的海牙認證服務</span></div>
            <div class="benefit">
                <table class="benefit__table">
                    <tr>
                        <td><span>免申請正本</span></td>
                        <td><span>免出門</span></td>
                    </tr>
                    <tr>
                        <td><span>免留證件</span></td>
                        <td><span>不須本人辦理</span></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>不限任何形式、語言、國家文件均可辦理</span></td>
                    </tr>
                </table>
                <div class="benefit__deco">
                    <img src="/img/bg-benefit.svg" alt="" class="image">
                </div>
            </div>
        </div>
        <div class="flow__steps">
            <div class="line line--sp">
                <span class="text"><em>10</em><em>-</em><em>12</em>工作天</span>
                <div class="deco">
                    <div class="deco__line"></div>
                </div>
            </div>
            <ul class="steps">
                <li>
                    <div class="stepsItem">
                        <div class="stepsItem__image"><img src="/img/img-flow-1.svg" alt="填寫線上表格" class="fitImg"></div>
                        <div class="stepsItem__text">
                            <div class="num">Step. 1</div>
                            <p class="intro">填寫線上表格</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="stepsItem">
                        <div class="stepsItem__image"><img src="/img/img-flow-2.svg" alt="填寫線上表格" class="fitImg"></div>
                        <div class="stepsItem__text">
                            <div class="num">Step. 2</div>
                            <p class="intro">上傳文件</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="stepsItem">
                        <div class="stepsItem__image"><img src="/img/img-flow-3.svg" alt="填寫線上表格" class="fitImg"></div>
                        <div class="stepsItem__text">
                            <div class="num">Step. 3</div>
                            <p class="intro">下單</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="stepsItem">
                        <div class="stepsItem__image"><img src="/img/img-flow-4.svg" alt="填寫線上表格" class="fitImg"></div>
                        <div class="stepsItem__text">
                            <div class="num">Step. 4</div>
                            <p class="intro">交由我們海牙認證</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="stepsItem">
                        <div class="stepsItem__image"><img src="/img/img-flow-5.svg" alt="填寫線上表格" class="fitImg"></div>
                        <div class="stepsItem__text">
                            <div class="num">Step. 5</div>
                            <p class="intro">收到海牙認證</p>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="line line--pc">
                <span class="text"><em>10</em><em>-</em><em>12</em>工作天</span>
                <div class="deco">
                    <div class="deco__line"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="compare">
    <div class="wrapper">
        <h3 class="compare__title">數位副本-海牙認證 (Apostille)</h3>
        <div class="compare__content">
            <div class="intro">文件副本認證加簽在國際上普遍被接受，認證程序與原始正本極為相似，主要區别是副本加簽為公證員宣誓該文件與正本相符且真實，但我們不針對文件內容真實性查證或公證，以提供您更優質、快速、便利的線上服務。</div>
            <div class="quite boxShadow">
                <div class="boxShadow__content">
                    <table class="quiteTable">
                        <thead>
                            <tr>
                                <th class="label"></th>
                                <th class="original">正本認證</th>
                                <th class="copy">副本認證</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="label"><span>公證</span><span>方式</span></th>
                                <td class="original"><span>香港國際律師查證</span>及公證其真實性<span></span></td>
                                <td class="copy"><span>公證員宣誓其</span><span>內容與正本相符</span></td>
                            </tr>
                            <tr>
                                <th class="label"><span>適用</span><span>文件</span></th>
                                <td class="original"><span>受限當地機關限制</span></td>
                                <td class="copy"><span>任何文件均可</span></td>
                            </tr>
                            <tr>
                                <th class="label"><span>形式</span></th>
                                <td class="original"><span>須提供正本紙本</span></td>
                                <td class="copy"><span>永久有效</span></td>
                            </tr>
                            <tr>
                                <th class="label"><span>法律</span><span>效力</span></th>
                                <td class="original"><span>上傳數位電子檔</span></td>
                                <td class="copy"><span>永久有效</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faq">
    <div class="faq__title">
        <div class="boxShadow">
            <div class="boxShadow__content">
                <div class="sub">雅信【海牙認證】線上服務</div>
                <div class="title">常見問題QA</div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('page_script')
<script src="js/user/index.js"></script>
@endPush
