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
            <div class="landingForm wow fadeIn" data-wow-delay="0s">
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
            <div class="landingText wow fadeIn" data-wow-delay="0.5s">
                <h3>{{ __('user.side.1.title') }}</h3>
                <ul>
                    <li>{{ __('user.landingText.description.paragraph.1') }}</li>
                    <li>{{ __('user.landingText.description.paragraph.2') }}</li>
                    <li>{{ __('user.landingText.description.paragraph.3') }}</li>
                    <li>{{ __('user.landingText.description.paragraph.4') }}</li>
                    <li>{{ __('user.landingText.description.paragraph.5') }}</li>
                    <li>{{ __('user.landingText.description.paragraph.6') }}</li>
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
                <div class="benefit__deco wow fadeIn">
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
                    <div class="quite__title wow fadeInRight">原始正本認證 VS. 數位副本認證</div>
                    <div class="quite__table wow fadeInRight">
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
    </div>
</section>
<section class="sns">
    <div class="wrapper">
        <ul class="snsList">
            <li><div class="btnWrap btnWrap--originSite"><a href="https://yahsin888.com/taiwan-apostille/" target="_blank" class="btn btn--originSite"><span class="btn__text">原始正本-海牙認證服務連結</span></a></div></li>
            <li><div class="btnWrap btnWrap--line"><a href="https://line.me/ti/p/QBRHoFJqrT#~" target="_blank" class="btn btn--line"><span class="btn__text">加入我們官方LINE好友</span></a></div></li>
        </ul>
    </div>
</section>
<section class="faq">
    <div class="faq__title">
        <div class="boxShadow">
            <div class="boxShadow__content">
                <div class="sub wow fadeInLeft">雅信【海牙認證】線上服務</div>
                <div class="topic wow fadeInLeft">常見問題QA</div>
            </div>
        </div>
    </div>
    <div class="faq__content">
        <ul class="faqList">
            <li class="faqList__item wow fadeInUp">
                <div class="question">Q1.非本國證明書或外國文件能否辦理海牙認證?</div>
                <div class="anwser">A:可以，僅須上傳文件數位檔，<span>【不限任何國家、語言、形式之文件】均可辦理。</span></div>
            </li>
            <li class="faqList__item wow fadeInUp">
                <div class="question">Q2.海牙認證需要本人親自到場辦理嗎?</div>
                <div class="anwser">A:不需要，電腦或手機拍照上傳文件數位檔即可辦理。</div>
            </li>
            <li class="faqList__item wow fadeInUp">
                <div class="question">Q3.委託辦理海牙認證需要多長時間?</div>
                <div class="anwser">A:【10-12個工作天】(不含郵寄)。</div>
            </li>
            <li class="faqList__item wow fadeInUp">
                <div class="question">Q4. 託『雅信翻譯』辦理線上-海牙認證，<span>有甚麼優勢?</span></div>
                <div class="anwser">
                    A:我們提供:
                    <ul class="serviceList">
                        <li>彩色文件列印</li>
                        <li>附公證員英文宣誓書(香港民政局用印)</li>
                        <li>香港高等法院書記官簽章及海牙認證加簽(Apostille)</li>
                        <li>DHL /SF EXPRESS【免運費】全球送達加值服務。</li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</section>
<section class="cooperation">
    <div class="wrapper">
        <h3 class="cooperation__title">合作單位</h3>
        <div class="cooperation__content">
            <ul class="coopList">
                <li class="wow fadeInUp" data-wow-delay="0s"><img src="/img/img-cooperation-boca.png" alt="" class="image"></li>
                <li class="wow fadeInUp" data-wow-delay="0.1s"><img src="/img/img-cooperation-judicial.png" alt="" class="image"></li>
                <li class="wow fadeInUp" data-wow-delay="0.2s"><img src="/img/img-cooperation-notaries_hk.png" alt="" class="image"></li>
                <li class="wow fadeInUp" data-wow-delay="0.3s"><img src="/img/img-cooperation-vtkcyc.png" alt="" class="image"></li>
                <li class="wow fadeInUp" data-wow-delay="0.4s"><img src="/img/img-cooperation-office_hk.png" alt="" class="image"></li>
                <li class="wow fadeInUp" data-wow-delay="0.5s"><img src="/img/img-cooperation-judiciary_hk.png" alt="" class="image"></li>
                <li class="wow fadeInUp" data-wow-delay="0.6s"><img src="/img/img-cooperation-sf.png" alt="" class="image"></li>
                <li class="wow fadeInUp" data-wow-delay="0.7s"><img src="/img/img-cooperation-hcch.png" alt="" class="image"></li>
            </ul>
        </div>
    </div>
</section>
<div class="docking"></div>
@endsection

@push('page_script')
<script src="js/user/index.js"></script>
@endPush
