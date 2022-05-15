@extends('vendor.registerLayout')
@section('contents')
<div class="wrapContent">
    <div class="completeTop">
        <img src=" {{URL::asset('assets/vendor/images/data/complete.svg')}}" alt="">
        <h1 class="complete-tlt">会員登録完了</h1>
        <p class="complete-note">ご登録いただき、ありがとうございます。</p>
        <p class="complete-plan">プラン登録が完了しました。早速商品を登録しましょう！</p>
    </div>
    <div class="completeFlow">
        <h2 class="completeFlow-tlt"><span>商品登録の流れ</span></h2>
        <ul>
            <li>
                <div class="flowItem"><img src=" {{URL::asset('assets/vendor/images/common/icon-complete.svg')}}" alt=""></div>
                <div class="flowInfo">
                    <div class="flowInfo-head">
                        <h3 class="tlt">商品の登録</h3><a class="support" href="#">ベンダー様のご対応</a>
                    </div>
                    <div class="flowInfo-txt">
                        <p>商品の登録ページ「新しい商品を新規作成」ボタンより、商品を作成します。<br>商品情報をご入力の上、掲載申請をしてください。</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="flowItem"><img src="../images/common/icon-complete01.svg" alt=""></div>
                <div class="flowInfo">
                    <div class="flowInfo-head">
                        <h3 class="tlt">承認</h3>
                        <div class="flowInfo-item">
                            <img src="{{URL::asset('assets/vendor/images/data/logo-footer.svg')}}">
                        </div>
                    </div>
                    <div class="flowInfo-txt">
                        <p>ご登録いただいた商品内容の確認と、対象補助金の紐付けを行なった上で、掲載させていただきます。</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="flowItem"><img src="{{URL::asset('assets/vendor/images/common/icon-complete02.svg')}}" alt=""></div>
                <div class="flowInfo">
                    <div class="flowInfo-head">
                        <h3 class="tlt">出品完了</h3>
                    </div>
                    <div class="flowInfo-txt">
                        <p>内容に問題がなければ、ご登録いただいた商品がKAERUN（かえるん）で公開されます。</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="btn-complete">
        <button type="button" class="btn btn-outline-dark btn-lg btn-fs15">マイページへ</button>
        <button type="button" class="btn btn-primary btn-lg">さっそく、商品を登録する</button>
    </div>
</div>
@endsection
