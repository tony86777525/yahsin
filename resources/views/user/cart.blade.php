@extends('user.basic.wrapper')

@push('csrf_token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endPush

@push('page_css')
<link rel="stylesheet" href="css/user/cart.css" />
@endPush

@section('main')
<form action="" class="trolley trolley--cart">
    <div class="trolley__cart">
        <div class="wrapper">
            <div class="cart">
                <div class="cart__sample">
                    <img src="/img/img-apostille.jpg" alt="" class="image">
                </div>
                <div class="cart__content form">
                    <div class="form__title"><h2>確認訂購份數</h2></div>
                    <div class="form__content">
                        <div class="price">
                            <div class="price__bill">
                                <div class="billSelect">
                                    <div class="fancyWrap fancyWrap--bill">
                                        <select name="bill" class="fancySelect fancySelect--bill">
                                            <option value="twd">NT$</option>
                                            <option value="usd">USD</option>
                                            <option value="rmb">RMB￥</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="priceShow">8800 / 件</div>
                            </div>
                            <div class="price__note">此為大約金額顯示，國外消費因匯率轉換，實際仍以請款金額為主。</div>
                        </div>
                        <p class="paragraph">
                            我們的加簽服務：我們將彩色列印您的文件<br>
                            由公證員英文公證宣誓後，至香港高等法院海牙認證(Apostille)加簽。<br>
                            包括公證費、政府規費及雜支。<br>
                            使用DHL Express / SF Express【免運費】全球快遞送到府。<br>
                            我們將掃描及彩色影印您的文件，您無需郵寄原件
                        </p>
                        <div class="amount">
                            <div class="amount__text">如果您上傳了不止一份文件，請手動更新以下文件數量</div>
                            <div class="amount__manual">
                                <div class="insert">
                                    <div class="fancyWrap fancyWrap--inputTxt">
                                        <label>
                                            <input name="amount" type="number" value="" class="fancyInput fancyInput--inputTxt">
                                        </label>
                                    </div>
                                </div>
                                <div class="action">
                                    <div class="btnWrap btnWrap--submit">
                                        <button type="button" class="btn btn--submit"><span class="btn__text">變更</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="amount__price">
                                總金額<span class="count">19,600</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="trolley__payment">
        <div class="wrapper">
            <div class="pay form">
                <div class="form__title"><h2>付款方式</h2></div>
                <div class="form__content">
                    <ul class="payList">
                        <li><input id="payment_creditcard" type="radio" name="payment" value="creditcard" class="fancyInput fancyInput--hidden  fancyInput--radio"><label for="payment_creditcard">信用卡</label></li>
                        <li><input id="payment_paypal" type="radio" name="payment" value="paypal" class="fancyInput fancyInput--hidden fancyInput--radio"><label for="payment_paypal">PayPal</label></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="trolley__delivery">
        <div class="wrapper">
            <div class="delivery">
                <div class="delivery__form form form--delivery">
                    <div class="form__title">
                        <h2>收件者資訊</h2>
                    </div>
                    <div class="form__row form__row--default">
                        <div class="formCol">
                            <span class="formLabel">收件人姓名</span>
                            <div class="fancyWrap fancyWrap--inputTxt">
                                <label>
                                    <input name="recipient_name" type="text" value="" class="fancyInput fancyInput--inputTxt">
                                </label>
                            </div>
                        </div>
                        <div class="formCol">
                            <span class="formLabel">公司名稱（選擇性）</span>
                            <div class="fancyWrap fancyWrap--inputTxt">
                                <label>
                                    <input name="company_name" type="text" value="" class="fancyInput fancyInput--inputTxt">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form__row form__row--area">
                        <div class="formCol">
                            <span class="formLabel">國家</span>
                            <div class="fancyWrap fancyWrap--country">
                                <select name="address_country" class="fancySelect fancySelect--country select2">
                                    <option value="">123</option>
                                    <option value="">456</option>
                                    <option value="">789</option>
                                    <option value="">123</option>
                                    <option value="">456</option>
                                    <option value="">789</option>
                                    <option value="">123</option>
                                    <option value="">456</option>
                                    <option value="">789</option>
                                    <option value="">123</option>
                                    <option value="">456</option>
                                    <option value="">789</option>
                                </select>
                            </div>
                        </div>
                        <div class="formCol">
                            <span class="formLabel">地區</span>
                            <div class="fancyWrap fancyWrap--country">
                                <select name="address_country" class="fancySelect fancySelect--country">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="formCol">
                            <span class="formLabel">郵遞區號</span>
                            <div class="fancyWrap fancyWrap--inputTxt">
                                <label>
                                    <input name="address_code" type="text" value="" class="fancyInput fancyInput--inputTxt">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form__row form__row--address">
                        <div class="formCol">
                            <span class="formLabel">地址</span>
                            <div class="fancyWrap fancyWrap--inputTxt">
                                <label>
                                    <input name="recipient_name" type="text" value="" class="fancyInput fancyInput--inputTxt">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form__row form__row--default">
                        <div class="formCol">
                            <span class="formLabel">收件人聯絡電話</span>
                            <div class="fancyWrap fancyWrap--inputTxt">
                                <label>
                                    <input name="recipient_tel" type="text" value="" class="fancyInput fancyInput--inputTxt">
                                </label>
                            </div>
                        </div>
                        <div class="formCol">
                            <span class="formLabel">收件人Email</span>
                            <div class="fancyWrap fancyWrap--inputTxt">
                                <label>
                                    <input name="recipient_mail" type="text" value="" class="fancyInput fancyInput--inputTxt">
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
                                <button type="submit" class="btn btn--submit"><span class="btn__text">前往付款頁面</span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('page_script')
<script src="/js/user/cart.js"></script>
@endPush
