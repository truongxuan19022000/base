@extends('vendor.registerLayout')
@section('contents')
<div class="wrapContent">
    <div class="registerHead">
        <h1 class="registerHead-title">メールアドレスの確認</h1>
        <p class="registerHead-text">ご入力いただいたメールアドレスに確認メールを送信しました。</p>
    </div>
    <div class="confirmBox">
        <div class="confirmTop">
            <p class="confirmTop-tlt">登録の手続きはまだ完了していません。</p>
            <p class="confirmTop-tlt confirmTop-mtSp">確認メールに記載のURLから会員情報の登録手続きを行ってください。</p>
            <p class="confirmTop-text">メールに記載されているURLをクリックして、会員登録の手続きを行ってください。</p>
        </div>
        <div class="confirmBottom">
            <p class="confirmBottom-text">※確認メールに記載されているURLの有効期限は配信後72時間です。</p>
            <p class="confirmBottom-text mt-3">【30分以内に確認メールが届かない場合】確認メールが届かない場合、ご入力に間違いがあるか、ドメイン拒否の設定をされている可能性があります。</p>
        </div>
    </div>
</div>
@endsection
