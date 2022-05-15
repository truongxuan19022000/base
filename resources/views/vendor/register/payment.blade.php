@extends('vendor.registerLayout')
@section('contents')
<div class="wrapContent">
    <div class="registerHead">
        <p class="registerHead-step f-roboto">STEP <span>3</span>/5</p>
        <h1 class="registerHead-title">お支払い方法</h1>
        <p class="registerHead-text">プラン料金のお支払い方法をご入力ください。</p>
    </div>
    <div class="accountTbl">
        <table class="tableBox">
            <tbody>
            <tr>
                <th>お支払い情報<span class="spanControl spanRequired">必須</span></th>
                <td>
                    <div class="accountForm">
                        <div class="formGroup">
                            <label class="formGroup-label">お支払い方法</label>
                            <div class="formGroup-control">
                                <ul class="formGroup-method">
                                    <li>
                                        <label class="custom-control custom-radio custom-radio-change">
                                            <input name="radio" class="custom-control-input" type="radio" checked>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">クレジットカード</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-control custom-radio custom-radio-change">
                                            <input name="radio" class="custom-control-input" type="radio">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">銀行振込</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="formGroup">
                            <label class="formGroup-label">カード番号（ハイフン・スペースなし）</label>
                            <div class="formGroup-control">
                                <input class="form-control" type="text" placeholder="例）1234567890123456">
                                <ul class="formGroup-payment">
                                    <li><img src="{{asset('assets/vendor/images/data/payment-01.png')}}" alt=""></li>
                                    <li><img src="{{asset('assets/vendor/images/data/payment-02.png')}}" alt=""></li>
                                    <li><img src="{{asset('assets/vendor/images/data/payment-03.png')}}" alt=""></li>
                                    <li><img src="{{asset('assets/vendor/images/data/payment-04.png')}}" alt=""></li>
                                    <li><img src="{{asset('assets/vendor/images/data/payment-05.png')}}" alt=""></li>
                                </ul>
                            </div>
                        </div>
                        <div class="formGroup">
                            <label class="formGroup-label">有効期限（月/年）</label>
                            <div class="formGroup-control">
                                <ul class="formGroup-date">
                                    <li>
                                        <input class="form-control" type="text" placeholder="01">
                                    </li>
                                    <li>
                                        <input class="form-control" type="text" placeholder="2024">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="formGroup">
                            <label class="formGroup-label">セキュリティコード <span class="item"><img src="{{asset('assets/vendor/images/common/icon-question-circle.svg')}}" alt=""></span></label>
                            <div class="formGroup-control">
                                <div class="formGroup-code">
                                    <input class="form-control" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="formGroup">
                            <label class="formGroup-label">カード名義</label>
                            <div class="formGroup-control">
                                <input class="form-control" type="text" placeholder="例）TARO YAMADA">
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="btn-wrap">
        <button type="button" class="btn btn-outline-dark btn-lg btn-fs15">戻る</button>
        <button type="button" class="btn btn-primary btn-lg">入力内容の確認へ</button>
    </div>
</div>
@endsection
