@extends('user.basic.wrapper')

@push('csrf_token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endPush

@push('page_css')
<link rel="stylesheet" href="css/user/cart.css" />
@endPush

@section('main')
<form action="" class="form form--cart">
    <div class="form__cart">
        <div class="wrapper">
            <div class="cart">
                <div class="cart__sample">
                    <img src="/img/img-apostille.jpg" alt="" class="image">
                </div>
                <div class="cart__content">
                    <h3 class="title">確認訂購份數</h3>
                    <div class="price">
                        <div class="price__bill">
                            <div class="billSelect">
                                <select name="bill">
                                    <option value="NT$"></option>
                                    <option value="USD"></option>
                                    <option value="RMB￥"></option>
                                </select>
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
                            <div class="insert"><input type="number"></div>
                            <div class="action"><button type="button" class="btn btn--check"><span class="btn__text">變更</span></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form__payment">
        <div class="wrapper">
            <ul class="payList">
                <li><input id="payment_creditcard" type="radio" name="payment" value="creditcard"><label for="payment_creditcard">信用卡</label></li>
                <li><input id="payment_paypal" type="radio" name="payment" value="paypal"><label for="payment_paypal">PayPal</label></li>
            </ul>
        </div>
    </div>
    <div class="form__delivery">
        <div class="wrapper">
            <div class="delivery">
                <div class="delivery__title"></div>
                <div class="delivery__form"></div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('page_script')
<script src="js/user/cart.js"></script>
@endPush
