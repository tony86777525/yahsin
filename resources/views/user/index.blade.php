@extends('user.basic.wrapper')

@push('csrf_token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endPush

@push('page_css')
    <link rel="stylesheet" href="/css/user/index.css" />
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
    <link rel="gettext" type="application/x-po" href="/languages/{{ app()->getLocale() }}.po" />
@endPush

@section('main')
    <section id="landing" class="landing">
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
                            <h2>{{ __('user.landingForm.title') }}</h2>
                            <p>{{ __('user.landingForm.notice.1') }}<br>{{ __('user.landingForm.notice.2') }}</p>
                        </div>
                        <div class="form__row">
                            <div class="formCol">
                                <span class="formLabel">{{ __('user.landingForm.label.name') }}</span>
                                <div class="fancyWrap fancyWrap--inputTxt">
                                    <label>
                                        <input name="name" type="text" value="{{ old('name') ?? '' }}" class="fancyInput fancyInput--inputTxt">
                                    </label>
                                </div>
                            </div>
                            <div class="formCol">
                                <span class="formLabel">{{ __('user.landingForm.label.file.1') }}</span>
                                <div class="fancyWrap fancyWrap--inputFile" data-input-id="elWrap">
                                    <label>
                                        <span class="fancyInput fancyInput--inputFile" data-input-id="uploadFile">{{ __('user.landingForm.file.select') }}</span>
                                        <input type="file" name="files[]" value="{{ old("files.0") ?? '' }}" class="fancyInput fancyInput--hidden" data-input-id="hiddenFile" data-file-text="{{ __('user.landingForm.file.select') }}">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form__row">
                            <div class="formCol">
                                <span class="formLabel">{{ __('user.landingForm.label.email') }}</span>
                                <div class="fancyWrap fancyWrap--inputTxt">
                                    <label>
                                        <input name="email" type="text" value="{{ old('email') ?? '' }}" class="fancyInput fancyInput--inputTxt">
                                    </label>
                                </div>
                            </div>
                            <div class="formCol">
                                <span class="formLabel">{!! __('user.landingForm.label.file.2') !!}</span>
                                <div class="fancyWrap fancyWrap--inputFile" data-input-id="elWrap">
                                    <label>
                                        <span class="fancyInput fancyInput--inputFile" data-input-id="uploadFile">{{ __('user.landingForm.file.select') }}</span>
                                        <input type="file" name="files[]" value="{{ old("files.1") ?? '' }}" class="fancyInput fancyInput--hidden" data-input-id="hiddenFile" data-file-text="{{ __('user.landingForm.file.select') }}">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form__row">
                            <div class="formCol">
                                <span class="formLabel">{{ __('user.landingForm.label.country') }}</span>
                                <div class="fancyWrap fancyWrap--country">
                                    <select name="country" class="fancySelect fancySelect--country select2 gds-cr gds-countryflag" country-data-region-id="gds-cr-one" data-language="{{ app()->getLocale() }}">
                                           <option value=""></option>
                                    </select>
                                    <select name="recipient_address_country" class="fancySelect fancySelect--country" id="gds-cr-one" style="display:none;">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="formCol">
                                <span class="formLabel">{!! __('user.landingForm.label.file.3') !!}</span>
                                <div class="fancyWrap fancyWrap--inputFile" data-input-id="elWrap">
                                    <label>
                                        <span class="fancyInput fancyInput--inputFile" data-input-id="uploadFile">{{ __('user.landingForm.file.select') }}</span>
                                        <input type="file" name="files[]" value="{{ old("files.2") ?? '' }}" class="fancyInput fancyInput--hidden" data-input-id="hiddenFile" data-file-text="{{ __('user.landingForm.file.select') }}">
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
                                    <button type="submit" class="btn btn--submit"><span class="btn__text">{{ __('user.landingForm.button.submit') }}</span></button>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <div class="mask">
                        <div class="mask__wrapper">
                            <div class="loading loadingio-spinner-ellipsis-rgbrrjn5xz">
                                <div class="ldio-qb9fb7iuf6">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="landingText wow fadeIn" data-wow-delay="0.5s">
                    <h3>{{ __('user.landingText.title') }}</h3>
                    <ul>
                        <li>{{ __('user.landingText.description.paragraph.1') }}</li>
                        <li>{{ __('user.landingText.description.paragraph.2') }}</li>
                        <li>{{ __('user.landingText.description.paragraph.3') }}</li>
                        <li>{{ __('user.landingText.description.paragraph.4') }}</li>
                        <li>{{ __('user.landingText.description.paragraph.5', ['price' => App\Models\Order::PRICE]) }}</li>
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
                                <div
                                    class="featureItem__title"
                                    data-js-count="true"
                                    data-count="8500"
                                >{!! __('user.featureBoard.1.paragraph.1', ['number' => 8500]) !!}</div>
                                <div
                                    class="featureItem__content"
                                >{{ __('user.featureBoard.1.paragraph.2') }}</div>
                            </div>
                        </li>
                        <li>
                            <div class="featureItem featureItem--price">
                                <div class="featureItem__title" data-js-count="true" data-count="{{ App\Models\Order::PRICE }}">{!! __('user.featureBoard.2.paragraph.1', ['price' => App\Models\Order::PRICE]) !!}{!! __('user.featureBoard.2.paragraph.3') !!}</div>
                                <div class="featureItem__content">{{ __('user.featureBoard.2.paragraph.2') }}</div>
                            </div>
                        </li>
                        <li class="trans">
                            <div class="featureItem">
                                <div class="featureItem__title">{{ __('user.featureBoard.3') }}</div>
                                <div class="featureItem__content featureItem__content--trans">
                                    <img src="/img/img-trans-dhl.png" alt="" class="img-trans-dhl">
                                    <img src="/img/img-trans-sf.png" alt="" class="img-trans-sf">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="featureItem">
                                <div class="featureItem__title">{{ __('user.featureBoard.4.paragraph.1') }}</div>
                                <div class="featureItem__content">{{ __('user.featureBoard.4.paragraph.2') }}</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="flow" class="flow">
        <div class="wrapper">
            <h3 class="flow__title">{!! __('user.flow.title') !!}</h3>
            <div class="flow__content">
                <div class="intro"><span>{{ __('user.flow.content.intro') }}</span></div>
                <div class="benefit">
                    <table class="benefit__table">
                        <tr>
                            <td><span>{{ __('user.flow.content.benefit.1') }}</span></td>
                            <td><span>{{ __('user.flow.content.benefit.2') }}</span></td>
                        </tr>
                        <tr>
                            <td><span>{{ __('user.flow.content.benefit.3') }}</span></td>
                            <td><span>{{ __('user.flow.content.benefit.4') }}</span></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span>{{ __('user.flow.content.benefit.5') }}</span></td>
                        </tr>
                    </table>
                    <div class="benefit__deco wow fadeIn">
                        <img src="/img/bg-benefit.svg" alt="" class="image">
                    </div>
                </div>
            </div>
            <div class="flow__steps">
                <div class="line line--sp">
                    <span class="text"><em>10</em><em>-</em><em>12</em>{{ __('user.flow.steps.line') }}</span>
                    <div class="deco">
                        <div class="deco__line"></div>
                    </div>
                </div>
                <ul class="steps">
                    <li>
                        <div class="stepsItem">
                            <div class="stepsItem__image"><img src="/img/img-flow-1.svg" alt="{!! __('user.flow.step.1') !!}" class="fitImg"></div>
                            <div class="stepsItem__text">
                                <div class="num">{{ __('user.flow.steps', ['step' => 1]) }}</div>
                                <p class="intro">{!! __('user.flow.step.1') !!}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="stepsItem">
                            <div class="stepsItem__image"><img src="/img/img-flow-2.svg" alt="{!! __('user.flow.step.2') !!}" class="fitImg"></div>
                            <div class="stepsItem__text">
                                <div class="num">{{ __('user.flow.steps', ['step' => 2]) }}</div>
                                <p class="intro">{!! __('user.flow.step.2') !!}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="stepsItem">
                            <div class="stepsItem__image"><img src="/img/img-flow-3.svg" alt="{{ __('user.flow.step.3') }}" class="fitImg"></div>
                            <div class="stepsItem__text">
                                <div class="num">{{ __('user.flow.steps', ['step' => 3]) }}</div>
                                <p class="intro">{{ __('user.flow.step.3') }}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="stepsItem">
                            <div class="stepsItem__image"><img src="/img/img-flow-4.svg" alt="{!! __('user.flow.step.4') !!}" class="fitImg"></div>
                            <div class="stepsItem__text">
                                <div class="num">{{ __('user.flow.steps', ['step' => 4]) }}</div>
                                <p class="intro">{!! __('user.flow.step.4') !!}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="stepsItem">
                            <div class="stepsItem__image"><img src="/img/img-flow-5.svg" alt="{{ __('user.flow.step.5') }}" class="fitImg"></div>
                            <div class="stepsItem__text">
                                <div class="num">{{ __('user.flow.steps', ['step' => 5]) }}</div>
                                <p class="intro">{{ __('user.flow.step.5') }}</p>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="line line--pc">
                    <span class="text"><em>10</em><em>-</em><em>12</em>{{ __('user.flow.steps.line') }}</span>
                    <div class="deco">
                        <div class="deco__line"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="compare">
        <div class="wrapper">
            <h3 class="compare__title">{{ __('user.compare.title') }}</h3>
            <div class="compare__content">
                <div class="intro">{{ __('user.compare.content.intro') }}</div>
                <div class="quite quite--text boxShadow">
                        <div class="boxShadow__content">
                            <div class="quite__title wow fadeInRight">{!! __('user.compare.content.quite.title') !!}</div>
                            <div class="quite__table wow fadeInRight">
                                <table class="quiteTable">
                                    <thead>
                                    <tr>
                                        <th class="label"></th>
                                        <th class="original">{{ __('user.compare.content.quite.original') }}</th>
                                        <th class="copy">{{ __('user.compare.content.quite.copy') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th class="label">{!! __('user.compare.content.quite.label.1') !!}</th>
                                        <td class="original">{!! __('user.compare.content.quite.original.1') !!}</td>
                                        <td class="copy">{!! __('user.compare.content.quite.copy.1') !!}</td>
                                    </tr>
                                    <tr>
                                        <th class="label">{!! __('user.compare.content.quite.label.2') !!}</th>
                                        <td class="original">{!! __('user.compare.content.quite.original.2') !!}</td>
                                        <td class="copy">{!! __('user.compare.content.quite.copy.2') !!}</td>
                                    </tr>
                                    <tr>
                                        <th class="label">{!! __('user.compare.content.quite.label.3') !!}</th>
                                        <td class="original">{!! __('user.compare.content.quite.original.3') !!}</td>
                                        <td class="copy">{!! __('user.compare.content.quite.copy.3') !!}</td>
                                    </tr>
                                    <tr>
                                        <th class="label">{!! __('user.compare.content.quite.label.4') !!}</th>
                                        <td class="original">{!! __('user.compare.content.quite.original.4') !!}</td>
                                        <td class="copy">{!! __('user.compare.content.quite.copy.4') !!}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @if (app()->getLocale() === 'es' || app()->getLocale() === 'en')
                    <div class="quite quite--image">
                        <img src="/img/img-compare_{{ app()->getLocale() }}.png" alt="" class="image">
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="sns">
        <div class="wrapper">
            <ul class="snsList">
                <li><div class="btnWrap btnWrap--originSite"><a href="https://yahsin888.com/taiwan-apostille/" target="_blank" class="btn btn--originSite"><span class="btn__text">{!! __('user.sns.list.origin') !!}</span></a></div></li>
                <li><div class="btnWrap btnWrap--line"><a href="https://line.me/ti/p/QBRHoFJqrT#~" target="_blank" class="btn btn--line"><span class="btn__text">{!! __('user.sns.list.line') !!}</span></a></div></li>
                <li><div class="btnWrap btnWrap--weixin"><a href="https://u.wechat.com/kPasqCZDytubQS4saCxVxXw" target="_blank" class="btn btn--weixin"><span class="btn__text">{!! __('user.sns.list.weixin') !!}</span></a></div></li>
            </ul>
        </div>
    </section>
    <section id="faq" class="faq">
        <div class="faq__title">
            <div class="boxShadow">
                <div class="boxShadow__content">
                    <div class="sub wow fadeInLeft">{{ __('user.faq.title.1') }}</div>
                    <div class="topic wow fadeInLeft">{{ __('user.faq.title.2') }}</div>
                </div>
            </div>
        </div>
        <div class="faq__content">
            <ul class="faqList">
                <li class="faqList__item wow fadeInUp">
                    <div class="question">{{ __('user.faq.list.q.1') }}</div>
                    <div class="anwser">{{ __('user.faq.list.a.1') }}</div>
                </li>
                <li class="faqList__item wow fadeInUp">
                    <div class="question">{{ __('user.faq.list.q.2') }}</div>
                    <div class="anwser">{{ __('user.faq.list.a.2') }}</div>
                </li>
                <li class="faqList__item wow fadeInUp">
                    <div class="question">{{ __('user.faq.list.q.3') }}</div>
                    <div class="anwser">{{ __('user.faq.list.a.3') }}</div>
                </li>
                <li class="faqList__item wow fadeInUp">
                    <div class="question">{{ __('user.faq.list.q.4') }}</div>
                    <div class="anwser">
                        {{ __('user.faq.list.a.4.content') }}
                        <ul class="serviceList">
                            <li>{{ __('user.faq.list.a.4.content.1') }}</li>
                            <li>{{ __('user.faq.list.a.4.content.2') }}</li>
                            <li>{{ __('user.faq.list.a.4.content.3') }}</li>
                            <li>{{ __('user.faq.list.a.4.content.4') }}</li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section id="contact" class="contact">
        <div class="wrapper">
            <div class="contact__title">{{ __('user.contact.title') }}</div>
            <div class="contact__content">
                <ul class="contactInfo">
                    <li>{{ __('user.contact.company') }}</li>
                    <li><a href="{{ __('user.contact.address.href') }}" target="_blank">{{ __('user.contact.address.text') }}</a></li>
                    <li><a href="tel:{{ __('user.contact.tel.href') }}">{{ __('user.contact.tel.text') }}</a></li>
                    <li><a href="mailto:{{ __('user.contact.mail.href') }}">{{ __('user.contact.mail.text') }}</a></li>
                    <li>
                        <ul class="contactSns">
                            <li>
                                <span class="text">LINE ID<br>yahsin888</span>
                                <img src="/img/img-qrcode_line.jpg" class="image">
                            </li>
                            <li>
                                <span class="text">Wechat ID<br>steveyeah168</span>
                                <img src="/img/img-qrcode_weixin.jpg" class="image">
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="cooperation">
        <div class="wrapper">
            <h3 class="cooperation__title">{{ __('user.cooperation.title') }}</h3>
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
    <div class="docking">
        <a href="#landing" data-js-item="anchor"><img src="/img/img-fixedBtn_{{ app()->getLocale() }}.png" alt="開始訂購"></a>
    </div>
@endsection

@push('page_script')
    <script src="/js/user/index.js"></script>
    <script src="/languages/geodatasource-cr.min.js"></script>
    <script src="/languages/gettext.js"></script>
@endPush
