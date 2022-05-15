@extends('vendor.main')
@section('contents')
<div class="wrapContent">
    <div class="registerHead">
        <p class="registerHead-step f-roboto">STEP <span>4</span>/5</p>
        <h1 class="registerHead-title">登録内容の確認</h1>
        <p class="registerHead-text">ご登録の内容を再度ご確認の上、お申し込みください。</p>
    </div>
    <div class="confirmTbl">
        <table class="tableBox">
            <tbody>
            <tr>
                <th>
                    <div class="confirmTbl-fl">
                        <span>ご登録プラン</span>
                        <a href="#">変更</a>
                    </div>
                </th>
                <td>
                    <div class="confirmTbl-lst">
                        <ul>
                            <li>
                                <div class="confirmTbl-tlt">
                                    <span>プラン名</span>
                                </div>
                                <div class="confirmTbl-cmt">
                                    <p>シルバー</p>
                                </div>
                            </li>
                            <li>
                                <div class="confirmTbl-tlt">
                                    <span>月額料金(税込)</span>
                                </div>
                                <div class="confirmTbl-cmt">
                                    <p>¥30,000</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <div class="confirmTbl-fl">
                        <span>会員情報</span>
                        <a href="#">変更</a>
                    </div>
                </th>
                <td>
                    <div class="confirmTbl-lst">
                        <ul>
                            <li>
                                <div class="confirmTbl-tlt">
                                    <span>会社情報</span>
                                </div>
                                <div class="confirmTbl-cmt">
                                    <p>株式会社ABC</p>
                                    <p>従業員数30人</p>
                                </div>
                            </li>
                            <li>
                                <div class="confirmTbl-tlt">
                                    <span>ホームページ</span>
                                </div>
                                <div class="confirmTbl-cmt">
                                    <p>https://example.co.jp</p>
                                </div>
                            </li>
                            <li>
                                <div class="confirmTbl-tlt">
                                    <span>連絡先</span>
                                </div>
                                <div class="confirmTbl-cmt">
                                    <p>0312345678</p>
                                </div>
                            </li>
                            <li>
                                <div class="confirmTbl-tlt">
                                    <span>住所</span>
                                </div>
                                <div class="confirmTbl-cmt">
                                    <p>〒 1230000</p>
                                    <p>東京都</p>
                                    <p>渋谷区渋谷１−２−３</p>
                                    <p>ABCマンション１０２</p>
                                </div>
                            </li>
                            <li>
                                <div class="confirmTbl-tlt">
                                    <span>担当者</span>
                                </div>
                                <div class="confirmTbl-cmt">
                                    <p>山田 太郎（やまだ たろう）</p>
                                    <p>マーケティング部 部長</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <div class="confirmTbl-fl">
                        <span>お支払い情報</span>
                        <a href="#">変更</a>
                    </div>
                </th>
                <td>
                    <div class="confirmTbl-lst">
                        <ul>
                            <li>
                                <div class="confirmTbl-tlt">
                                    <span>支払い方法</span>
                                </div>
                                <div class="confirmTbl-cmt">
                                    <p>クレジットカード</p>
                                </div>
                            </li>
                            <li>
                                <div class="confirmTbl-tlt">
                                    <span>カード番号</span>
                                </div>
                                <div class="confirmTbl-cmt">
                                    <p>**** **** **** 1234</p>
                                </div>
                            </li>
                            <li>
                                <div class="confirmTbl-tlt">
                                    <span>カード名義</span>
                                </div>
                                <div class="confirmTbl-cmt">
                                    <p>TARO YAMADA</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <div class="confirmTbl-fl">
                        <span>決済情報</span>
                    </div>
                </th>
                <td>
                    <div class="confirmTbl-lst">
                        <ul>
                            <li>
                                <div class="confirmTbl-tlt">
                                    <span>初回決済(税込)</span>
                                </div>
                                <div class="confirmTbl-cmt">
                                    <p>¥30,000</p>
                                    <p>引き落とし（2021/10/25）</p>
                                </div>
                            </li>
                            <li>
                                <div class="confirmTbl-tlt">
                                    <span>次回以降(税込)</span>
                                </div>
                                <div class="confirmTbl-cmt">
                                    <p>¥30,000</p>
                                    <p>毎月10日</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="btn-wrap">
        <button type="button" class="btn btn-outline-dark btn-lg btn-fs15">戻る</button>
        <button type="button" class="btn btn-primary btn-lg">お支払い情報の入力へ</button>
    </div>
</div>
@endsection
